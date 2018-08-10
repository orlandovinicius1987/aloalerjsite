<?php
namespace App\Http\Controllers;

use App\Http\Requests\PersonAddress as PersonAddressRequest;
use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;


class PersonAddresses extends Controller
{
    /**
     * @return $this
     */
    public function create($person_id)
    {
        $person = $this->peopleRepository->findById($person_id);

        return view('callcenter.person_addresses.form')
            ->with('person', $person)
            ->with(['address' => $this->peopleRepository->new()]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PersonAddressRequest $request)
    {
        $view = 'callcenter.people.form';
        $message = $this->messageDefault;
        if ($request->get('workflow')) {
            $view = 'callcenter.person_contacts.form';
            $message = 'Endereço cadastro com sucesso.';
        }

        $request->merge(['id' => $request->get('address_id')]);
        $request->merge([
            'street' =>
                trim($request->get('street')) . ', ' . $request->get('number'),
        ]);
        $this->peopleAddressesRepository->createFromRequest($request);

        $person = $this->peopleRepository->findById($request->get('person_id'));
        $records = $this->recordsRepository->findByPerson($person->id);
        $addresses = $this->peopleAddressesRepository->findByPerson(
            $person->id
        );
        $contacts = $this->peopleContactsRepository->findByPerson($person->id);

        return view($view)
            ->with('person', $person)
            ->with('records', $records)
            ->with('addresses', $addresses)
            ->with('contacts', $contacts)

            ->with($this->getComboBoxMenus())

            ->with(['contact' => $this->peopleContactsRepository->new()])

            ->with('message', $message)
            ->with('workflow', $request->get('workflow'));
    }

    /**
     * @param $cpf_cnpj
     *
     * @return $this
     */
    public function show($id)
    {
        $address = $this->peopleAddressesRepository->findById($id);
        $person = $this->peopleRepository->findById($address->person_id);

        return view('callcenter.person_addresses.form')
            ->with($this->getComboBoxMenus())
            ->with('address', $address)
            ->with('person', $person);
    }
}
