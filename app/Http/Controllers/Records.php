<?php
namespace App\Http\Controllers;

use App\Http\Requests\RecordRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ViaRequest;
use App\Data\Repositories\Vias as ViasRepository;

class Records extends Controller
{
    /**
     * @return $this
     */
    public function create($person_id)
    {
        $person = $this->peopleRepository->findById($person_id);

        $workflow = is_null(session('data'))
            ? null
            : session('data')['workflow'];

        return view('callcenter.records.form')
            ->with('person', $person)
            ->with('workflow', $workflow)
            ->with('record', $this->recordsRepository->new())
            ->with($this->getComboBoxMenus());
    }

    protected function makeViewDataFromRecord($record)
    {
        return array_merge($this->getComboBoxMenus(), [
            'person' => $record->person,
            'record' => $record,
            'records' => $this->recordsRepository->findByPerson(
                $record->person_id
            ),
            'addresses' => $this->peopleAddressesRepository->findByPerson(
                $record->person_id
            ),
            'contacts' => $this->peopleContactsRepository->findByPerson(
                $record->person_id
            ),
            'workflow' => request()->get('workflow'),
        ]);
    }

    /**
     * @param Request $request
     */
    protected function showSuccessMessage(RecordRequest $request): void
    {
        $this->flashMessage(
            $request->get('workflow')
                ? 'Protocolo cadastrado com sucesso.'
                : $this->messageDefault
        );
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RecordRequest $request)
    {
        $record = $this->recordsRepository->create(coollect($request->all()));
        if (is_null($request->get('record_id'))) {
            $request->merge(['record_id' => $record->id]);
            $this->progressesRepository->createFromRequest($request);
        }

        $this->showSuccessMessage($request);

        return redirect()
            ->route(
                $request->get('workflow')
                    ? 'persons_addresses.create'
                    : 'persons.show',
                ['person_id' => $record->person->id]
            )
            ->with('data', $this->makeViewDataFromRecord($record));
    }

    /**
     * @param $cpf_cnpj
     *
     * @return $this
     */
    public function show($id)
    {
        $record = $this->recordsRepository->findById($id);
        $person = $this->peopleRepository->findById($record->person_id);

        return view('callcenter.records.form')
            ->with($this->getComboBoxMenus())
            ->with(
                'progresses',
                $this->progressesRepository->allWherePaginate(
                    'record_id',
                    $id,
                    15
                )
            )
            ->with('record', $record)
            ->with('person', $person);
    }

    public function index()
    {
        $records = $this->recordsRepository->whereIsNullPaginate(
            'resolved_at',
            15
        );
        return view('callcenter.records.index')->with('records', $records);
    }
}
