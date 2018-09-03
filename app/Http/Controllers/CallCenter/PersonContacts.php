<?php
namespace App\Http\Controllers\CallCenter;

use App\Services\Workflow;
use Illuminate\Http\Request;
use App\Data\Models\ContactType;
use App\Data\Models\PersonContact;
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
    public function store(PersonContactsWorkflowRequest $request)
    {
        $route = 'people.show';

        $message = $this->messageDefault;

        if (Workflow::started()) {
            $this->createPersonContact($request, 'mobile');
            $this->createPersonContact($request, 'whatsapp');
            $this->createPersonContact($request, 'email');
            $this->createPersonContact($request, 'phone');
        }

        $person = $this->peopleRepository->findById($request->get('person_id'));
        $records = $this->recordsRepository->findByPerson($person->id);
        $addresses = $this->peopleAddressesRepository->findByPerson(
            $person->id
        );
        $contacts = $this->peopleContactsRepository->findByPerson($person->id);

        $with = [];
        $with = array_merge($with, $this->getComboBoxMenus());
        $with['person'] = $person;
        $with['records'] = $records;
        $with['addresses'] = $addresses;
        $with['contacts'] = $contacts;

        $this->showSuccessMessage('Protocolo cadastrado com sucesso.');

        Workflow::end();

        return redirect()->route($route, ['person_id' => $person->id]);
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
                'old' => old(),
            ])
            ->with('contact', $contact)
            ->with('person', $person);
    }

    /**
     * @param PersonRequest $request
     */
    private function createPersonContact(
        PersonContactsWorkflowRequest $request,
        $code
    ) {
        if ($request->get($code)) {
            PersonContact::create([
                'person_id' => $request->get('person_id'),
                'contact_type_id' =>
                    ContactType::where('code', $code)->first()->id,
                'contact' => $request->get($code),
            ]);
        }
    }

    public function insertContact(PersonContactsRequest $request)
    {
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
            'person_id' => $request->get('person_id'),
        ]);
    }
}
