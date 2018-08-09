<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\ViaRequest;
use App\Http\Requests\CallRequest;
use App\Data\Repositories\Vias as ViasRepository;

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
            ->with(['record' => $this->recordsRepository->new()])
            ->with($this->getComboBoxMenus());
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $view = 'callcenter.people.form';
        $message = $this->messageDefault;
        if ($request->get('workflow')) {
            $view = 'callcenter.person_addresses.form';
            $message = 'Protocolo cadastrado com sucesso.';
        }

        $person = $this->peopleRepository->findById($request->get('person_id'));

        $request->merge(['id' => $request->get('record_id')]);
        $record = $this->recordsRepository->createFromRequest($request);

        $record->protocol = sprintf(
            '%s%s%s.%s.%s%s.%s',
            Carbon::now()->year,
            Carbon::now()->month,
            Carbon::now()->day,
            $person->id,
            Carbon::now()->hour,
            Carbon::now()->minute,

            $record->id
        );

        $record->save();

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
        $record = $this->recordsRepository->findById($id);
        $person = $this->peopleRepository->findById($record->person_id);

        return view('callcenter.records.form')
            ->with($this->getComboBoxMenus())
            ->with('record', $record)
            ->with('person', $person);
    }
}
