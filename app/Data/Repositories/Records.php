<?php
namespace App\Data\Repositories;

use Carbon\Carbon;
use App\Data\Models\Record;
use Illuminate\Support\Facades\Auth;
use App\Data\Repositories\People as PeopleRepository;
use App\Data\Repositories\PersonContacts as PersonContactRepository;
use Illuminate\Support\Str;

class Records extends Base
{
    /**
     * @var $model
     */
    protected $model = Record::class;

    protected $peopleRepository;

    protected $personContactRepository;

    /**
     * Records constructor.
     *
     * @param PeopleRepository $personRepository
     * @param PersonContactRepository $personContactRepository
     * @internal param Repository $repository
     */
    public function __construct(
        PeopleRepository $personRepository,
        PersonContactRepository $personContactRepository
    ) {
        $this->peopleRepository = $personRepository;
        $this->personContactRepository = $personContactRepository;
    }

    /**
     * @param $person
     * @param $record
     */
    private function addProtocolNumberToRecord($person, $record): void
    {
        if (!$record->protocol) {
            $record->protocol = $this->makeProtocolNumber($person, $record);
            $record->save();
        }
    }

    /**
     * @param person_id
     *
     * @return mixed
     */
    public function findByPerson($person_id)
    {
        return $this->model::where('person_id', $person_id)->get();
    }

    public function create($data)
    {
        $person = $this->peopleRepository->findOrCreate($data);

        if (isset($data->record_id)) {
            $data = $data->merge(['id' => $data->record_id]);
        }
        $data = $data->merge(['person_id' => $person->id]);

        $record = $this->createFromRequest($data);

        $this->addProtocolNumberToRecord($person, $record);

        $this->addAccessCodeToRecord($record);

        return $record;
    }

    function generateRandomString($length = 4)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function addAccessCodeToRecord($record)
    {
        $record->access_code = strtoupper($this->generateRandomString(4));
        $record->save();
    }

    private function makePersonalDataInfoFromContactData($data)
    {
        return "Data de nascimento: {$data['birthdate']}\n" .
            "Sexo: {$data['sex_1']}\n" .
            "Identidade de gênero: {$data['sex_2']}\n" .
            "Escolaridade: {$data['scholarship']}\n" .
            "Área de atuação: {$data['area']}\n";
    }

    public function markAsResolved($record_id, $progress = null)
    {
        $record = $this->model::find($record_id);
        $record->resolved_at = now();
        $record->resolve_progress_id = $progress->id;
        $record->resolved_by_id = Auth::user()->id;
        $record->save();
    }

    public function markAsNotResolved($record_id)
    {
        $record = $this->model::find($record_id);
        $record->resolved_at = null;
        $record->resolve_progress_id = null;
        $record->resolved_by_id = null;
        $record->save();
    }

    public function findByProtocol($protocol)
    {
        return app(Records::class)->findByColumn(
            'protocol',
            $this->cleanProtocol($protocol)
        );
    }

    private function cleanProtocol($protocol)
    {
        return preg_replace('/[^0-9]/', '', $protocol);
    }

    public function allNotResolved()
    {
        return $this->model
            ::whereNull('resolved_at')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
    }

    /**
     * @param $person
     * @param $record
     * @return string
     */
    public function makeProtocolNumber($person, $record)
    {
        return sprintf(
            '%s%s',
            str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT),
            str_pad(trim($record->id), 9, '0', STR_PAD_LEFT)
        );
    }

    /**
     * @param $data
     */
    public function absorbContactForm($data)
    {
        $person = $this->peopleRepository->findByCpfCnpj($data['cpf']);

        if (!$person) {
            $person = $this->peopleRepository->create(
                $data = array_merge($data, [
                    'cpf_cnpj' => $data['cpf'],
                    'name' => $data['name'],
                    'identification' => trim(
                        $data['identidade'] . ' ' . $data['expeditor']
                    )
                ])
            );
        }

        if (!$person->notes) {
            $person->notes = $this->makePersonalDataInfoFromContactData($data);

            $person->save();
        }

        $person->findOrCreateAddress([
            'person_id' => $person->id,
            'zipcode' => $data['cep'],
            'street' => $data['rua'],
            'number' => $data['numero'],
            'complement' => $data['complemento'],
            'neighbourhood' => $data['bairro'],
            'city' => $data['cidade'],
            'state' => 'RJ',
            'is_mailable' => true,
            'validated_at' => now(),
            'active' => true
        ]);

        $person->findOrCreatePhone([
            'person_id' => $person->id,
            'contact' => $data['telephone']
        ]);

        if ($data['email']) {
            $person->findOrCreateEmail([
                'person_id' => $person->id,
                'contact' => $data['email']
            ]);
        }

        $record = $this->create(
            coollect([
                'committee_id' => app(Committees::class)->findByName(
                    'ALÔ ALERJ'
                )->id,
                'record_type_id' => $data['record_type_id'],
                'person_id' => $person->id,
                'send_answer_by_email' => $data['email'] ? true : false
            ])
        );

        $progress = app(Progresses::class)->create([
            'record_id' => $record->id,
            'progress_type_id' => app(ProgressTypes::class)->findByName(
                'Entrada'
            )->id,
            'is_private' => 1,
            'original' => $data['message'],
            'origin_id' => app(Origins::class)->findByName('E-mail')->id,
            'objeto_id',
            'record_action_id'
        ]);

        $record->sendNotifications();

        return $record;
    }

    public function getLastRecordFromPerson($person_id): Record
    {
        return Record::where('person_id', $person_id)
            ->orderBy('created_at', 'asc')
            ->first();
    }

    public function isSearchColumn($term)
    {
        $notSearchingTerms = collect([
            'per_page',
            'page',
            '_token',
            'created_at_start',
            'created_at_end',
            'resolved_at_start',
            'resolved_at_end'
        ]);
        return !$notSearchingTerms->contains($term);
    }

    public function createdAtBetweenDate($data, $query)
    {
        if (
            isset($data['created_at_start']) &&
            !is_null($data['created_at_start'])
        ) {
            $query->whereDate(
                'records.created_at',
                '>=',
                $data['created_at_start']
            );
        }
        if (
            isset($data['created_at_end']) &&
            !is_null($data['created_at_end'])
        ) {
            $query->whereDate(
                'records.created_at',
                '<=',
                $data['created_at_end']
            );
        }

        return $query;
    }

    public function resolvedAtBetweenDate($data, $query)
    {
        if (
            isset($data['resolved_at_start']) &&
            !is_null($data['resolved_at_start'])
        ) {
            $query->whereDate(
                'records.resolved_at',
                '>=',
                $data['resolved_at_start']
            );
        }
        if (
            isset($data['resolved_at_end']) &&
            !is_null($data['resolved_at_end'])
        ) {
            $query->whereDate(
                'records.resolved_at',
                '<=',
                $data['resolved_at_end']
            );
        }

        return $query;
    }

    public function advancedSearch($data)
    {
        $records = (new Record())->newQuery();

        foreach ($data as $key => $collumn) {
            if (!is_null($collumn) && $this->isSearchColumn($key)) {
                switch ($key) {
                    case 'person_name':
                        $records
                            ->join(
                                'people',
                                'people.id',
                                '=',
                                'records.person_id'
                            )
                            ->where(
                                'people.name',
                                'ilike',
                                '%' . $collumn . '%'
                            )
                            ->select('records.*');
                        break;
                    case 'created_by_committee_id':
                        $records->whereRaw(
                            "(select progresses.created_by_committee_id from progresses where progresses.record_id=records.id order by progresses.created_at limit 1)={$collumn}"
                        );
                        break;
                    default:
                        $records->where($key, $collumn);
                }
            }
        }

        $this->createdAtBetweenDate($data, $records);
        $this->resolvedAtBetweenDate($data, $records);

        $records->orderBy('records.created_at', 'desc');

        if ($data['per_page'] == 'all') {
            return $records->paginate($records->count());
        } else {
            return $records->paginate(
                $data['per_page'],
                ['*'],
                'page',
                $data['page']
            );
        }
    }
}
