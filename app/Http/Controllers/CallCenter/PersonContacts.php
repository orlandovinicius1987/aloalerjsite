<?php
namespace App\Http\Controllers\CallCenter;

use App\Services\Workflow;
use Illuminate\Http\Request;
use App\Data\Models\ContactType;
use App\Data\Models\PersonContact;
use App\Data\Repositories\Records as RecordsRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\PersonContactsRequest;
use App\Http\Requests\PersonContactsWorkflowRequest;

class PersonContacts extends Controller
{
    /**
     * @return $this
     */
    public function create($person_id)
    {
        $person = $this->peopleRepository->findById($person_id);

        return view('callcenter.person_contacts.form-workflow')
            ->with('person', $person)
            ->with(['contact' => $this->peopleContactsRepository->new()])
            ->with($this->getComboBoxMenus());
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeViaWorkflow(PersonContactsWorkflowRequest $request)
    {
        $this->peopleContactsRepository->createPersonContact($request, 'mobile');
        $this->peopleContactsRepository->createPersonContact($request, 'whatsapp');
        $this->peopleContactsRepository->createPersonContact($request, 'email');
        $this->peopleContactsRepository->createPersonContact($request, 'phone');

        $person = $this->peopleRepository->findById($request->get('person_id'));

        $record = app(RecordsRepository::class)->getLastRecordFromPerson($person->id);
        $record->sendNotifications();

        $this->showSuccessMessage('Protocolo criado com sucesso.');

        Workflow::end();

        return redirect()->route('records.show-protocol', [
            'id' => $record->id
        ]);
    }

    /**
     * @param $cpf_cnpj
     *
     * @return $this
     */
    public function show($id)
    {
        $contact = $this->peopleContactsRepository->findById($id);
        $person = $this->peopleRepository->findById($contact->person_id);

        return view('callcenter.person_contacts.form')
            ->with($this->getComboBoxMenus())
            ->with('laravel', [
                'contact' => $contact->toArray(),
                'person' => $person->toArray(),
                'old' => old()
            ])
            ->with('contact', $contact)
            ->with('person', $person);
    }

    public function insertContact(PersonContactsRequest $request)
    {
        $this->showSuccessMessage();

        $this->peopleContactsRepository->createFromRequest($request);

        return redirect()
            ->route('people.show', ['person_id' => $request->get('person_id')])
            ->with($this->getSuccessMessage());
    }

    public function update(PersonContactsRequest $request)
    {
        $this->showSuccessMessage();

        $request->merge(['id' => $request->get('contact_id')]);
        $this->peopleContactsRepository->createFromRequest($request);

        return redirect()->route('people.show', [
            'person_id' => $request->get('person_id')
        ]);
    }
}
