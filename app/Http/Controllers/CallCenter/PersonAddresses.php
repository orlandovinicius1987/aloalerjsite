<?php
namespace App\Http\Controllers\CallCenter;

use App\Services\Workflow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonAddressesRequest;

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
            ->with(['address' => $this->peopleRepository->new()])
            ->with($this->getComboBoxMenus())
            ->with('formDisabled', false);
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
            ->with('person', $person)
            ->with('formDisabled', true);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PersonAddressesRequest $request)
    {
        $route = 'people.show';
        $message = $this->messageDefault;
        if (Workflow::started()) {
            $route = 'people_contacts.create';
            $message = 'Endereço cadastro com sucesso.';
        }

        $request->merge(['id' => $request->get('address_id')]);
        $this->peopleAddressesRepository->createFromRequest($request);

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

        return redirect()->route($route, ['person_id' => $person->id]);
    }
}
