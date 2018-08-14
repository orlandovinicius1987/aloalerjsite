<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;
use App\Data\Models\PersonContact;
use App\Data\Models\ContactType;

class PersonContacts extends Controller
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

        return view('callcenter.person_contacts.form')
            ->with('person', $person)
            ->with('workflow', $workflow)
            ->with(['contact' => $this->peopleContactsRepository->new()])
            ->with($this->getComboBoxMenus());
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $route = 'persons.show';
        $message = $this->messageDefault;
        if ($request->get('workflow')) {
            $message = 'Protocolo cadastrado com sucesso.';

            $this->createPersonContact($request, 'mobile');
            $this->createPersonContact($request, 'whatsapp');
            $this->createPersonContact($request, 'email');
            $this->createPersonContact($request, 'phone');
        }

        //$request->merge(['id' => $request->get('contact_id')]);
        //$this->peopleContactsRepository->createFromRequest($request);

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
        $with['message'] = $message;
        $with['workflow'] = $request->get('workflow');

        return redirect()
            ->route($route, ['person_id' => $person->id])
            ->with('data', $with);
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
            ->with('contact', $contact)
            ->with('person', $person);
    }

    /**
     * @param $cpf_cnpj
     *
     * @return $this
     */
    public function createOutside($person_id)
    {
        $personContact = $this->peopleContactsRepository->findByPerson(
            $person_id
        );

        $contact = [];

        foreach ($personContact as $item) {
            $contact[$item->contactType->code] = $item->contact;
        }
        $contact = (object) $contact;

        $person = $this->peopleRepository->findById($person_id);

        return view('callcenter.person_contacts.form-outside')
            ->with($this->getComboBoxMenus())
            ->with('contact', $contact)
            ->with('person', $person);
    }

    /**
     * @param PersonRequest $request
     */
    private function createPersonContact(Request $request, $code)
    {
        if ($request->get($code)) {
            PersonContact::create([
                'person_id' => $request->get('person_id'),
                'contact_type_id' =>
                    ContactType::where('code', $code)->first()->id,
                'contact' => $request->get($code),
            ]);
        }
    }
}
