<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;

class PersonsAddressesController extends Controller
{
    /**
     * @return $this
     */
    public function create($person_id)
    {
        $person = $this->personsRepository->findById($person_id);

        return view('callcenter.personsaddresses.form')
            ->with('person', $person)
            ->with(['address' => $this->personsRepository->new()]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PersonRequest $request)
    {
        $view = 'callcenter.persons.form';
        $message = $this->messageDefault;
        if ($request->get('workflow')) {
            $view = 'callcenter.personscontacts.form';
            $message = 'Endereço cadastro com sucesso.';
        }

        $request->merge(['id' => $request->get('address_id')]);
        $this->personsAddressesRepository->createFromRequest($request);

        $person = $this->personsRepository->findById(
            $request->get('person_id')
        );
        $calls = $this->callsRepository->findByPerson($person->id);
        $addresses = $this->personsAddressesRepository->findByPerson(
            $person->id
        );
        $contacts = $this->personsContactsRepository->findByPerson($person->id);

        return view($view)
            ->with('person', $person)
            ->with('calls', $calls)
            ->with('addresses', $addresses)
            ->with('contacts', $contacts)

            ->with($this->getComboBoxMenus())

            ->with(['contact' => $this->personsContactsRepository->new()])

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
        $address = $this->personsAddressesRepository->findById($id);
        $person = $this->personsRepository->findById($address->person_id);

        return view('callcenter.personsAddresses.form')
            ->with($this->getComboBoxMenus())
            ->with('address', $address)
            ->with('person', $person);
    }
}
