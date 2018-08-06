<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;

class PersonsController extends Controller
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
            $person = $this->personsRepository->findByCollumn(
                'cpf_cnpj',
                $pesquisa
            );
            if ($person) {
                $calls = $this->callsRepository->findByPerson($person->id);
                $addresses = $this->personsAddressesRepository->findByPerson(
                    $person->id
                );
                $contacts = $this->personsContactsRepository->findByPerson(
                    $person->id
                );

                return view('callcenter.persons.form')
                    ->with('person', $person)
                    ->with('calls', $calls)
                    ->with('addresses', $addresses)
                    ->with('contacts', $contacts)
                    ->with(['origins' => $this->originsRepository->all()]);
            } else {
                dd("pessoa não encontrada");
            }
        } else {
            return view('callcenter.persons.index');
        }
    }

    /**
     * @return $this
     */
    public function create()
    {
        return view('callcenter.persons.form')
            ->with(['person' => $this->personsRepository->new()])
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
        $url = 'callcenter.persons.form';
        $message = $this->messageDefault;
        if (!$request->get('person_id')) {
            $url = 'callcenter.calls.form';
            $message = 'Usuário cadastrado com sucesso.';
        }
        $view = view($url);
        $view->with($this->getComboBoxMenus());

        if ($request->get('person_id')) {
            $person = $this->personsRepository->findById(
                $request->get('person_id')
            );
            $calls = $this->callsRepository->findByPerson($person->id);
            $addresses = $this->personsAddressesRepository->findByPerson(
                $person->id
            );
            $contacts = $this->personsContactsRepository->findByPerson(
                $person->id
            );

            $view
                ->with('calls', $calls)
                ->with('addresses', $addresses)
                ->with('contacts', $contacts);
        } else {
            $view
                ->with(['call' => $this->callsRepository->new()])
                ->with('workflow', $request->get('workflow'));
        }

        $request->merge(['id' => $request->get('person_id')]);
        $person = $this->personsRepository->createFromRequest($request);

        return $view
            ->with('person', $person)

            ->with('message', $message);
    }

    /**
     * @param $cpf_cnpj
     *
     * @return $this
     */
    public function show($cpf_cnpj)
    {
        return view('callcenter.persons.form')
            ->with('formDisabled', true)
            ->with([
                'person' => $this->personsRepository->findByCollumn(
                    'cpf_cnpj',
                    $cpf_cnpj
                ),
            ]);
    }
}
