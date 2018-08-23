<?php
namespace App\Services;

use App\Data\Models\Area;
use App\Data\Models\Origin;
use App\Data\Models\RecordAction;
use Carbon\Carbon;
use App\Data\Models\User;
use App\Data\Models\Record;
use App\Data\Models\Person;
use App\Data\Models\Progress;
use App\Data\Models\UserType;
use App\Data\Models\ContactType;
use App\Data\Models\ProgressType;
use App\Data\Models\PersonAddress;
use App\Data\Models\PersonContact;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Debug\Exception\FatalThrowableError;

class ImportCercred
{
    protected $command;

    protected $counter = 0;

    private function getAllHistory($historico_id)
    {
        $history = coollect(
            $this->db()->select(
                'select
  historico_propriedade.historico_id,
  historico_propriedade.historico_propriedade_id,
  historico_propriedade.valor historico_propriedade_valor,
  historico_propriedade_tipo.historico_propriedade_tipo,
  historico_propriedade_tipo.descricao historico_propriedade_tipo_descricao
from historico
  left join historico_propriedade on historico_propriedade.historico_id = historico.historico_id
  left join historico_propriedade_tipo on historico_propriedade_tipo.historico_propriedade_tipo = historico_propriedade.historico_propriedade_tipo
  left join historico_tipo on historico.historico_tipo = historico_tipo.historico_tipo
  left join action_historico on historico_tipo.historico_tipo = action_historico.historico_tipo
  left join action on action.action_id = action_historico.action_id
  left join action_type on action_type.action_type = action.action_type
where  historico_propriedade_tipo.descricao is not null
and historico.historico_id = ' .
                    $historico_id
            )
        );

        if ($history->isEmpty()) {
            return null;
        }

        return $history;
    }

    public function import($command)
    {
        ini_set('memory_limit', '2048M');

        $this->command = $command;

        \Debugbar::disable();

        DB::connection()->disableQueryLog();

        $this->people();
        //
        $this->emails();
        //
        $this->phones();
        //
        $this->addresses();
        //
        $this->users();
        //
        $this->progressTypes();

        $this->recordActions();

        $this->recordsAndProgress();
    }

    private function createProgress($history, $record)
    {
        if ($history->historico_complemento) {
            Progress::create(
                $this->sanitize([
                    'record_id' => $record->id,
                    'progress_type_id' =>
                        ProgressType::firstOrCreate([
                            'name' => $history->historico_tipo_descricao,
                        ])->id,
                    'created_by_id' => $history->historico_usuario_id_alteracao,
                    'original' => $history->historico_complemento,
                    'created_at' => $history->historico_data_inicio_atendimento,
                    'updated_at' => $history->historico_data_inicio_atendimento,
                    'history_fields' => $history->history_fields->toJson(),
                    'origin_id' => $this->inferOriginFromHistory($history),
                ])
            );

            $this->increment();
        }
    }

    private function createRecordFromProtocol($protocol)
    {
        $this->increment();

        return Record::create(
            $this->sanitize([
                'protocol' => $protocol->protocolo_codigo,
                'person_id' => $protocol->pessoa_id,
                'record_type_id' => $protocol->pessoa_id,
                'area_id' => $this->inferAreaFromProtocol($protocol) ?: 999999,
                'record_action_id' => $this->inferActionFromProtocol($protocol),
                'created_at' => $date = $this->inferDateFromProtocol($protocol),
                'updated_at' => $date,
            ])
        );
    }

    /**
     * @param $history
     * @return mixed
     */
    private function findRecordActionByName($history)
    {
        $action = RecordAction::where(
            'name',
            $history->action_description
        )->first();

        return $action;
    }

    public function inferActionFromProtocol($protocol)
    {
        $action = null;

        if (isset($protocol->history_data[0])) {
            $history = $protocol->history_data[0];

            $action = $this->findRecordActionByName($history);

            if (!$action && $history->action_id) {
                RecordAction::insert([
                    'id' => $history->action_id,
                    'name' => $history->action_description,
                ]);

                $action = $this->findRecordActionByName($history);

                DB::statement(
                    "SELECT setval('public.record_actions_id_seq', (SELECT max(id) FROM public.record_actions));"
                );
            }
        }

        return $action ? $action->id : null;
    }

    private function inferDateFromProtocol($protocol)
    {
        if (isset($protocol->history_data[0])) {
            return $protocol->history_data[0]
                ->historico_data_inicio_atendimento;
        }

        return null;
    }

    private function inferAreaFromProtocol($protocol)
    {
        if (isset($protocol->history_data[0])) {
            $data = $protocol->history_data[0]->history_fields->where(
                'historico_propriedade_tipo_descricao',
                'Comissão Responsável'
            )->first();

            if (
                $data instanceof \stdClass ||
                isset($data['historico_propriedade_valor'])
            ) {
                return Area::firstOrCreate([
                    'name' => $data->historico_propriedade_valor,
                ])->id;
            }
        }

        return null;
    }

    private function inferOriginFromHistory($history)
    {
        if (!$history = $this->getAllHistory($history->historico_id)) {
            return null;
        }

        $origin = $history
            ->where('historico_propriedade_tipo_descricao', 'Origem')
            ->first();

        if (
            $origin instanceof \stdClass ||
            isset($origin['historico_propriedade_valor'])
        ) {
            return Origin::firstOrCreate([
                'name' => $origin->historico_propriedade_valor,
            ])->id;
        }

        return null;
    }

    private function inferOriginFromProtocol($protocol)
    {
        if (isset($protocol->history_data[0])) {
            $data = $protocol->history_data[0]->history_fields->where(
                'historico_propriedade_tipo_descricao',
                'Origem'
            )->first();

            if (
                $data instanceof \stdClass ||
                isset($data['historico_propriedade_valor'])
            ) {
                return Origin::firstOrCreate([
                    'name' => $data->historico_propriedade_valor,
                ])->id;
            }
        }

        return null;
    }

    protected function recordsAndProgress()
    {
        $this->info('Importing RECORDS AND PROGRESS...');

        Person::all()->each(function ($person) {
            $person->protocols = $this->getProtocolsForPerson($person)
                ->map(function ($protocol) {
                    $protocol->history_data = $this->getHistory(
                        $protocol->objeto_id
                    )->map(function ($history) {
                        $history->history_fields = $this->getHistoryFields(
                            $history->historico_id
                        );

                        return $history;
                    });

                    return $protocol;
                })
                ->each(function ($protocol) {
                    $this->importProtocol($protocol);

                    $this->increment(
                        10,
                        "{$protocol->pessoa_nome} ({$protocol->pessoa_id})"
                    );
                });

            unset($person);

            $this->checkMemory();
        });

        DB::statement(
            "SELECT setval('public.progress_types_id_seq', (SELECT max(id) FROM public.progress_types));"
        );
    }

    /**
     * @param $this
     */
    function checkMemory()
    {
        if (memory_get_peak_usage() > 1500450656) {
            $this->info('----------------------- END OF MEMORY');
            die();
        }
    }

    public function importProtocol($protocol)
    {
        try {
            $record = $this->createRecordFromProtocol($protocol);

            $protocol->history_data->each(function ($history) use ($record) {
                $this->createProgress($history, $record);
            });
        } catch (\Exception $exception) {
            dump($protocol);

            throw $exception;
        } catch (FatalThrowableError $exception) {
            dump($protocol);

            throw $exception;
        }
    }

    private function recordActions()
    {
        $this->info('Importing RECORD ACTIONS...');

        RecordAction::truncate();

        $this->db()
            ->table('action')
            ->get()
            ->each(function ($row) {
                RecordAction::insert([
                    'id' => $row->action_id,
                    'name' => $row->description,
                ]);
            });

        DB::statement(
            "SELECT setval('public.record_actions_id_seq', (SELECT max(id) FROM public.record_actions));"
        );
    }

    protected function progressTypes()
    {
        $this->info('Importing PROGRESS TYPES...');

        ProgressType::truncate();

        $this->db()
            ->table('historico_tipo')
            ->get()
            ->each(function ($row) {
                ProgressType::insert([
                    'id' => $row->historico_tipo,
                    'name' => $row->descricao,
                ]);
            });

        DB::statement(
            "SELECT setval('public.progress_types_id_seq', (SELECT max(id) FROM public.progress_types));"
        );
    }

    protected function users()
    {
        $this->info('Importing USERS...');

        User::truncate();

        $this->db()
            ->table('usuario')
            ->get()
            ->each(function ($row) {
                User::insert(
                    $this->sanitize([
                        'id' => $row->usuario_id,
                        'name' => $row->nome,
                        'email' => $row->nome . '@cercred.com.br',
                        'username' => $row->nome,
                        'user_type_id' =>
                            UserType::where('name', 'Usuario')->first()->id,
                        'password' => bcrypt($row->nome . $row->usuario_id),
                    ])
                );
            });
    }

    protected function addresses()
    {
        $this->counter = 0;

        if (
            PersonAddress::count() ==
            $this->db()
                ->table('endereco')
                ->count()
        ) {
            $this->info('ADDRESSES: done');

            return;
        }

        $this->info('Importing ADDRESSES...');

        PersonAddress::truncate();

        $statuses = coollect(
            $this->db()
                ->table('endereco_status')
                ->get()
        );

        $types = coollect(
            $this->db()
                ->table('endereco_tipo')
                ->get()
        );

        $this->db()
            ->table('endereco')
            ->get()
            ->each(function ($endereco) use ($statuses, $types) {
                $type = lower(
                    $types
                        ->where('endereco_tipo', $endereco->endereco_tipo)
                        ->first()->descricao
                );

                $status = lower(
                    $statuses
                        ->where('endereco_status', $endereco->endereco_status)
                        ->first()->descricao
                );

                PersonAddress::create(
                    $this->sanitize(
                        $this->sanitize([
                            'person_id' => $endereco->pessoa_id,
                            'zipcode' => $endereco->cep,
                            'street' => $endereco->endereco,
                            'complement' => $endereco->complemento,
                            'neighbourhood' => $endereco->bairro,
                            'city' => $endereco->cidade,
                            'state' => $endereco->uf,
                            'is_mailable' => true,
                            'from' => $type,
                            'status' => $status,
                            'address_id' => $endereco->endereco_id,
                        ])
                    )
                );

                $this->increment(100, $endereco->endereco);
            });

        DB::statement(
            "SELECT setval('public.person_addresses_id_seq', (SELECT max(id) FROM public.person_addresses));"
        );
    }

    protected function phones()
    {
        $this->counter = 0;

        $phoneId = ContactType::where('code', 'phone')->first()->id;
        $mobileId = ContactType::where('code', 'mobile')->first()->id;

        if (
            PersonContact::whereIn('contact_type_id', [
                $phoneId,
                $mobileId,
            ])->count() ==
            $this->db()
                ->table('telefone')
                ->count()
        ) {
            $this->info('PHONES: done');

            return;
        }

        $this->info('Importing PHONES...');

        PersonContact::whereIn('contact_type_id', [
            $phoneId,
            $mobileId,
        ])->delete();

        $statuses = $this->db()
            ->table('telefone_status')
            ->get();

        $types = $this->db()
            ->table('telefone_tipo')
            ->get();

        $this->db()
            ->table('telefone')
            ->get()
            ->each(function ($telefone) use (
                $phoneId,
                $mobileId,
                $statuses,
                $types
            ) {
                $type = lower(
                    coollect($types)
                        ->where('telefone_tipo', $telefone->telefone_tipo)
                        ->first()->descricao
                );

                $status = lower(
                    coollect($statuses)
                        ->where('telefone_status', $telefone->telefone_status)
                        ->first()->descricao
                );

                PersonContact::create(
                    $this->sanitize([
                        'person_id' => $telefone->pessoa_id,
                        'contact_type_id' =>
                            $type == 'celular' ? $mobileId : $phoneId,
                        'contact' => $telefone->ddd . $telefone->telefone,
                        'from' => $type == 'celular' ? 'pessoal' : $type,
                        'status' => $status,
                        'provider_enrichment_id' =>
                            $telefone->enriquecimento_provedor_id,
                        'telefone_id' => $telefone->telefone_id,
                        'created_at' => Carbon::parse($telefone->inclusao),
                    ])
                );

                $this->increment(100, $telefone->telefone);
            });

        DB::statement(
            "SELECT setval('public.person_contacts_id_seq', (SELECT max(id) FROM public.person_contacts));"
        );
    }

    protected function emails()
    {
        $this->counter = 0;

        $contactTypeId = ContactType::where('code', 'email')->first()->id;

        if (
            PersonContact::where('contact_type_id', $contactTypeId)->count() ==
            $this->db()
                ->table('email')
                ->count()
        ) {
            $this->info('EMAILS: done');

            return;
        }

        $this->info('Importing EMAILS...');

        PersonContact::where('contact_type_id', $contactTypeId)->delete();

        $statuses = $this->db()
            ->table('email_status')
            ->get();

        $types = $this->db()
            ->table('email_tipo')
            ->get();

        //->where('email', 'sandrinhabs_35@yahoo.com.br')
        $this->db()
            ->table('email')
            ->get()
            ->each(function ($email) use ($contactTypeId, $statuses, $types) {
                $type = coollect($types)
                    ->where('email_tipo', $email->email_tipo)
                    ->first()->descricao;

                $status = coollect($statuses)
                    ->where('email_status', $email->email_status)
                    ->first()->descricao;

                $contact = PersonContact::create(
                    $this->sanitize([
                        'person_id' => $email->pessoa_id,
                        'contact_type_id' => $contactTypeId,
                        'contact' => $email->email,
                        'from' => lower($type),
                        'status' => lower($status),
                        'provider_enrichment_id' =>
                            $email->enriquecimento_provedor_id,
                        'email_id' => $email->email_id,
                    ])
                );

                $this->increment(100, "{$email->email} - {$email->email_id}");
            });

        DB::statement(
            "SELECT setval('public.person_contacts_id_seq', (SELECT max(id) FROM public.person_contacts));"
        );
    }

    protected function people()
    {
        $this->counter = 0;

        if (
            Person::count() ==
            $this->db()
                ->table('pessoa')
                ->count()
        ) {
            $this->info('PERSONS: done');

            return;
        }

        $this->info('Importing PERSONS...');

        Person::truncate();

        $this->db()
            ->table('pessoa')
            ->get()
            ->each(function ($person) {
                Person::insert(
                    $this->sanitize([
                        'id' => $person->pessoa_id,
                        'code' => $person->codigo,
                        'name' => $person->nome,
                        'cpf_cnpj' => $person->cpf,
                        'identification' => $person->rg,
                        'birthdate' => $person->nascimento,
                        'gender_id' => $person->sexo,
                        'civil_status_id' => $person->estado_civil_id,
                        'spouse_name' => $person->nome_conjuge,
                        'main_occupation_id' => $person->ocupacao_principal,
                        'scholarship_id' => $person->escolaridade_id,
                        'income' =>
                            (float) str_replace('$', '', $person->renda),
                        'person_type_id' => $person->tipo_pessoa,
                        'created_at' => $person->inclusao,
                        'updated_by_id' => $person->usuario_id_alteracao,
                    ])
                );

                $this->increment(100, "{$person->pessoa_id} - {$person->nome}");
            });

        DB::statement(
            "SELECT setval('public.people_id_seq', (SELECT max(id) FROM public.people));"
        );
    }

    protected function info($message)
    {
        $this->command->info($message);
    }

    protected function db()
    {
        return DB::connection('cercred');
    }

    private function getProtocolsForPerson($person)
    {
        return coollect(
            $this->db()->select(
                "select 
  DISTINCT
  pessoa.pessoa_id,
  pessoa.nome pessoa_nome,
  protocolo.protocolo_id,
  protocolo.protocolo_codigo,
  protocolo.objeto_id
from protocolo
  left join historico on protocolo.objeto_id = historico.objeto_id
  left join pessoa on
                     historico.pessoa_id = pessoa.pessoa_id
where pessoa.pessoa_id = {$person->id}
and pessoa.pessoa_id not in (select person_id from public.records)
order by pessoa.pessoa_id, protocolo.protocolo_id"
            )
        );
    }

    private function getHistory($objetoId)
    {
        return coollect(
            $this->db()->select(
                "select 
  DISTINCT
  historico.historico_id,
  historico.complemento historico_complemento,
  historico_tipo.descricao historico_tipo_descricao,
  historico.usuario_id_alteracao historico_usuario_id_alteracao,
  historico_tipo.historico_tipo,
  historico_tipo.descricao historico_tipo_descricao,
  historico.data_inicio_atendimento historico_data_inicio_atendimento,
  action.action_id action_id,
  action.description action_description,
  action.action_type action_type,
  action_type.description action_type_description
from historico
  left join historico_propriedade on historico_propriedade.historico_id = historico.historico_id
  left join historico_propriedade_tipo on historico_propriedade_tipo.historico_propriedade_tipo = historico_propriedade.historico_propriedade_tipo
  left join historico_tipo on historico.historico_tipo = historico_tipo.historico_tipo
  left join action_historico on historico_tipo.historico_tipo = action_historico.historico_tipo
  left join action on action.action_id = action_historico.action_id
  left join action_type on action_type.action_type = action.action_type
where historico.objeto_id = {$objetoId};"
            )
        );
    }

    private function getHistoryFields($historyId)
    {
        return coollect(
            $this->db()->select(
                "select
  historico_propriedade.historico_propriedade_id,
  historico_propriedade.valor historico_propriedade_valor,
  historico_propriedade_tipo.historico_propriedade_tipo,
  historico_propriedade_tipo.descricao historico_propriedade_tipo_descricao
from historico
  left join historico_propriedade on historico_propriedade.historico_id = historico.historico_id
  left join historico_propriedade_tipo on historico_propriedade_tipo.historico_propriedade_tipo = historico_propriedade.historico_propriedade_tipo
  left join historico_tipo on historico.historico_tipo = historico_tipo.historico_tipo
  left join action_historico on historico_tipo.historico_tipo = action_historico.historico_tipo
  left join action on action.action_id = action_historico.action_id
  left join action_type on action_type.action_type = action.action_type
where historico.historico_id = {$historyId};"
            )
        );
    }

    public function sanitize($array)
    {
        foreach ($array as $key => $value) {
            if (is_string($value)) {
                $array[$key] = trim($value);
            }
        }

        return $array;
    }

    public function increment($mod = 100, $message = '')
    {
        $this->counter++;

        if ($this->counter % $mod === 0) {
            $counter = str_pad($this->counter, 8, ' ', STR_PAD_LEFT);

            $memory = str_pad(
                number_format(memory_get_peak_usage()),
                13,
                ' ',
                STR_PAD_LEFT
            );

            $this->info("{$counter} records {$memory} bytes = {$message}");
        }
    }
}
