<?php
namespace App\Data\Repositories;

use Carbon\Carbon;
use App\Data\Models\Record;
use App\Data\Repositories\People as PeopleRepository;
use Illuminate\Support\Facades\Auth;

class Records extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = Record::class;

    protected $peopleRepository;

    /**
     * Records constructor.
     *
     * @param PeopleRepository $personRepository
     * @internal param Repository $repository
     */
    public function __construct(PeopleRepository $personRepository)
    {
        $this->peopleRepository = $personRepository;
    }

    private function addProgressForRecord($record, $data)
    {
        // TODO
    }

    /**
     * @param $person
     * @param $record
     */
    private function addProtocolNumberToRecord($person, $record): void
    {
        $record->protocol = sprintf(
            '%s%s%s.%s.%s%s.%s',
            Carbon::now()->year,
            Carbon::now()->month,
            Carbon::now()->day,
            $person->id,
            Carbon::now()->hour,
            Carbon::now()->minute,
            $record->id
        );

        $record->save();
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
        $person = $this->peopleRepository->findById($data->person_id);

        $data = $data->merge(['id' => $data->record_id]);

        $record = $this->createFromRequest($data);

        $this->addProtocolNumberToRecord($person, $record);

        $this->addProgressForRecord($record, $data);

        return $record;
    }

    public function markAsResolved($record_id)
    {
        $record = $this->model::find($record_id);
        $record->resolved_at = now();
        $record->resolved_by = Auth::user();
        $record->save();
    }
}
