<?php

namespace App\Http\Controllers\CallCenter;

use App\Services\Workflow;
use Illuminate\Http\Request;
use App\Http\Requests\ViaRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecordRequest;
use Illuminate\Support\Facades\Auth;
use App\Data\Repositories\Records as RecordsRepository;

class Records extends Controller
{
    /**
     * @param $person_id
     * @return $this
     */
    public function create($person_id)
    {
        $person = $this->peopleRepository->findById($person_id);

        return view('callcenter.records.form')
            ->with('person', $person)
            ->with('record', $this->recordsRepository->new())
            ->with($this->getComboBoxMenus('create'));
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
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RecordRequest $request)
    {
        $record = $this->recordsRepository->create(coollect($request->all()));

        $record->sendNotifications();

        if (is_null($request->get('record_id'))) {
            $request->merge(['record_id' => $record->id]);
            $this->progressesRepository->createFromRequest(
                $request
            )->sendNotifications();
        }

        $this->showSuccessMessage('Protocolo cadastrado com sucesso.');

        return redirect()->to(
            route(
                Workflow::started()
                    ? 'people_addresses.create'
                    : 'records.show-protocol',

                Workflow::started() ? $record->person->id : $record->id
            )
        );
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function finishRecord(RecordRequest $request)
    {
        $record = $this->recordsRepository->create(coollect($request->all()));

        $record->sendNotifications();

        $progress = $this->progressesRepository->create([
            'original' =>
                'Protocolo finalizado sem observações em ' .
                    $record->updated_at .
                    ' pelo usuário ' .
                    Auth::user()->name,
            'record_id' => $record->id,
        ]);

        $this->recordsRepository->markAsResolved($record->id, $progress);
        //        if (is_null($request->get('record_id'))) {
        //            $request->merge(['record_id' => $record->id]);
        //            $this->progressesRepository->createFromRequest($request);
        //        }

        $this->showSuccessMessage('Protocolo finalizado com sucesso.');

        return redirect()->route(
            Workflow::started() ? 'people_addresses.create' : 'people.show',
            ['person_id' => $record->person->id]
        );
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function openRecord(RecordRequest $request)
    {
        $record = $this->recordsRepository->create(coollect($request->all()));

        $record->sendNotifications();

        $progress = $this->progressesRepository->create([
            'original' =>
                'Protocolo reaberto sem observações em ' .
                    $record->updated_at .
                    ' pelo usuário ' .
                    Auth::user()->name,
            'record_id' => $record->id,
        ]);

        $this->recordsRepository->markAsNotResolved($record->id, $progress);
        //        if (is_null($request->get('record_id'))) {
        //            $request->merge(['record_id' => $record->id]);
        //            $this->progressesRepository->createFromRequest($request);
        //        }

        $this->showSuccessMessage('Protocolo reaberto com sucesso.');

        return redirect()->route(
            Workflow::started() ? 'people_addresses.create' : 'people.show',
            ['person_id' => $record->person->id]
        );
    }

    /**
     * @param $id
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
            'records' => $records = $this->recordsRepository->allNotResolved(),
            'onlyNonResolved' => true,
        ]);
    }

    public function showProtocol($record_id)
    {
        return view('callcenter.records.show-protocol')->with(
            'record',
            $this->recordsRepository->findById($record_id)
        );
    }

    public function showPublic($protocol)
    {
        return (
            !$record = app(RecordsRepository::class)->findByProtocol($protocol)
        )
            ? abort(404)
            : view('callcenter.records.show-public')->with('record', $record);
    }

    public function searchProtocol()
    {
        return view('callcenter.records.search');
    }

    public function showByProtocolNumber(Request $request)
    {
        $record = app(RecordsRepository::class)->findByProtocol(
            $request->protocol
        );

        return view('callcenter.records.search')
            ->with('record', $record)
            ->with('protocol', $request->protocol);
    }
}
