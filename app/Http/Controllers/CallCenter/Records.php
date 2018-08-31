<?php
namespace App\Http\Controllers\CallCenter;

use App\Services\Workflow;
use Illuminate\Http\Request;
use App\Http\Requests\ViaRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecordRequest;

class Records extends Controller
{
    /**
     * @return $this
     */
    public function create($person_id)
    {
        $person = $this->peopleRepository->findById($person_id);

        return view('callcenter.records.form')
            ->with('person', $person)
            ->with('record', $this->recordsRepository->new())
            ->with($this->getComboBoxMenus());
    }

    protected function makeViewDataFromRecord($record)
    {
        return array_merge($this->getComboBoxMenus(), [
            'person' => $record->person,
            'record' => $record,
            'records' => $this->recordsRepository->allWherePaginate(
                'person_id',
                $record->person_id
            ),
            'addresses' => $this->peopleAddressesRepository->findByPerson(
                $record->person_id
            ),
            'contacts' => $this->peopleContactsRepository->findByPerson(
                $record->person_id
            ),
        ]);
    }

    /**
     * @param Request $request
     */
    protected function showSuccessMessage(RecordRequest $request): void
    {
        $this->flashMessage(
            Workflow::started()
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

        return redirect()->route(
            Workflow::started() ? 'people_addresses.create' : 'people.show',
            ['person_id' => $record->person->id]
        );
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
                $this->progressesRepository->allWherePaginate('record_id', $id)
            )
            ->with('record', $record)
            ->with('person', $person);
    }

    public function index()
    {
        return view('callcenter.records.index')->with(
            'records',
            $this->recordsRepository->allPaginate()
        );
    }

    public function nonResolved()
    {
        return view('callcenter.records.index')->with([
            'records' =>
                $records = $this->recordsRepository->whereIsNullPaginate(
                    'resolved_at'
                ),
            'onlyNonResolved' => true,
        ]);
    }
}
