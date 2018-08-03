<?php
namespace App\Http\Controllers;

use App\Data\Models\PersonModel;
use App\Data\Repositories\AreasRepository;
use App\Data\Repositories\CallsRepository;
use App\Data\Repositories\CallTypesRepository;
use App\Data\Repositories\CommitteesRepository;
use App\Data\Repositories\PersonsAddressesRepository;
use App\Data\Repositories\PersonsContactsRepository;
use App\Data\Repositories\PersonsRepository;
use App\Data\Repositories\ViasRepository;
use App\Http\Requests\CallRequest;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\ViaRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CallsController extends BaseController
{
    /**
     * @return $this
     */
    public function create($person_id)
    {
        $person = $this->personsRepository->findById($person_id);

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
        $view = 'callcenter.persons.form';
        $message = $this->messageDefault;
        if ($request->get('workflow')) {
            $view = 'callcenter.personsaddresses.form';
            $message = 'Reclamação cadastrada com sucesso.';
        }

        $person = $this->personsRepository->findById(
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

            ->with(['address' => $this->personsRepository->new()])
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
        $person = $this->personsRepository->findById($call->person_id);

        return view('callcenter.calls.form')
            ->with($this->getComboBoxMenus())
            ->with('call', $call)
            ->with('person', $person);
    }
}
