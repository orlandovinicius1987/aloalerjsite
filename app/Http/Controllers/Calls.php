<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\ViaRequest;
use App\Http\Requests\CallRequest;
use App\Data\Repositories\Vias as ViasRepository;

class Calls  extends  Controller
{
    /**
     * @return $this
     */
    public function create($person_id)
    {
        $person = $this->peopleRepository->findById($person_id);

        return view('callcenter.calls.form')
            ->with('person', $person)
            ->with(['call' => $this->callsRepository->new()])
            ->with($this->getComboBoxMenus());
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CallRequest $request)
    {
        $view = 'callcenter.people.form';
        $message = $this->messageDefault;
        if ($request->get('workflow')) {
            $view = 'callcenter.peopleaddresses.form';
            $message = 'Reclamação cadastrada com sucesso.';
        }

        $person = $this->peopleRepository->findById(
            $request->get('person_id')
        );

        $request->merge(['id' => $request->get('call_id')]);
        $call = $this->callsRepository->createFromRequest($request);

        $call->protocol_number = sprintf(
            '%s%s%s.%s.%s%s.%s',
            Carbon::now()->year,
            Carbon::now()->month,
            Carbon::now()->day,
            $person->id,
            Carbon::now()->hour,
            Carbon::now()->minute,

            $call->id
        );

        $call->save();

        $calls = $this->callsRepository->findByPerson($person->id);
        $addresses = $this->peopleAddressesRepository->findByPerson(
            $person->id
        );
        $contacts = $this->peopleContactsRepository->findByPerson($person->id);

        return view($view)
            ->with('person', $person)
            ->with('calls', $calls)
            ->with('addresses', $addresses)
            ->with('contacts', $contacts)

            ->with($this->getComboBoxMenus())

            ->with(['address' => $this->peopleRepository->new()])
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
        $call = $this->callsRepository->findById($id);
        $person = $this->peopleRepository->findById($call->person_id);

        return view('callcenter.calls.form')
            ->with($this->getComboBoxMenus())
            ->with('call', $call)
            ->with('person', $person);
    }
}
