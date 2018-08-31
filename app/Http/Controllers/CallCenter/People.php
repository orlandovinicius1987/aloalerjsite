<?php
namespace App\Http\Controllers\CallCenter;

use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;

class People extends Controller
{
    /**
     * @param Request     $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $pesquisa = $request->get('pesquisa');

        if ($pesquisa) {
            $person = $this->peopleRepository->findByColumn(
                'cpf_cnpj',
                $pesquisa
            );
            if ($person) {
                $records = $this->recordsRepository->findByPerson($person->id);
                $addresses = $this->peopleAddressesRepository->findByPerson(
                    $person->id
                );
                $contacts = $this->peopleContactsRepository->findByPerson(
                    $person->id
                );

                return view('callcenter.people.form')
                    ->with('person', $person)
                    ->with('records', $records)
                    ->with('addresses', $addresses)
                    ->with('contacts', $contacts)
                    ->with(['origins' => $this->originsRepository->all()]);
            } else {
                dd("pessoa não encontrada");
            }
        } else {
            return view('callcenter.people.index');
        }
    }

    /**
     * @return $this
     */
    public function create($search)
    {
        $newPerson = $this->peopleRepository->new();

        if ($this->peopleRepository->validCpfCnpj($search)) {
            $newPerson->cpf_cnpj = $search;
        } else {
            if (!only_numbers($search)) {
                $newPerson->name = $search;
            }
        }

        return view('callcenter.people.form')
            ->with(['person' => $newPerson])
            ->with($this->getComboBoxMenus())
            ->with('workflow', '1');
    }

    /**
     * @param Request     $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PersonRequest $request)
    {
        $person_id = $this->userAlreadyRegistered($request);

        $route = 'people.show';
        $message = $this->messageDefault;
        if (!$person_id) {
            $route = 'records.create';
            $message = 'Usuário cadastrado com sucesso.';
        }

        $with = [];
        $with = array_merge($with, $this->getComboBoxMenus());

        if ($person_id) {
            $person = $this->peopleRepository->findById($person_id);
            $records = $this->recordsRepository->findByPerson($person->id);
            $addresses = $this->peopleAddressesRepository->findByPerson(
                $person->id
            );
            $contacts = $this->peopleContactsRepository->findByPerson(
                $person->id
            );

            $with['records'] = $records;
            $with['addresses'] = $addresses;
            $with['contacts'] = $contacts;
        } else {
            $with['record'] = $this->recordsRepository->new();
            $with['workflow'] = $request->get('workflow');
        }

        $request->merge(['id' => $person_id]);
        $person = $this->peopleRepository->createFromRequest($request);

        $with['person'] = $person;
        $with['message'] = $message;

        return redirect()
            ->route($route, ['person_id' => $person->id])
            ->with('data', $with);
    }

    /**
     * @param $cpf_cnpj
     *
     * @return $this
     */
    public function show($person_id)
    {
        $view = view('callcenter.people.form');

        $data = is_null(session('data')) ? [] : session('data');

        if (!empty($data)) {
            foreach ($data as $key => $item) {
                $view->with($key, $item);
            }

            return $view;
        } else {
            $person = $this->peopleRepository->findById($person_id);
            $records = (
                $this->recordsRepository->allWherePaginate(
                    'person_id',
                    $person_id,
                    15
                )
            );

            return $view
                ->with('person', $person)
                ->with('records', $records)
                ->with('addresses', $person->addresses)
                ->with('contacts', $person->contacts)
                ->with($this->getComboBoxMenus());
        }
    }

    /**
     * @param PersonRequest $request
     * @return $person_id
     */
    private function userAlreadyRegistered(PersonRequest $request)
    {
        $person = null;
        if (!$request->get('$person_id') and $request->get('cpf_cnpj')) {
            $person = $this->peopleRepository->findByColumn(
                'cpf_cnpj',
                $request->get('cpf_cnpj')
            );
        }
        return $person ? $person->id : $request->get('person_id');
    }

    /**
     * @return $this
     */
    public function form(Request $request)
    {
        dd($request);
        return view('callcenter.people.form')
            ->with(['person' => $this->peopleRepository->new()])
            ->with($this->getComboBoxMenus())
            ->with('workflow', '1');
    }
}
