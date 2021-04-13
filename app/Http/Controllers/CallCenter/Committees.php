<?php
namespace App\Http\Controllers\CallCenter;

use App\Data\Repositories\Committees as CommitteesRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommitteeRequest;

class Committees extends Controller
{
    /**
     * @var CommitteeRepository
     */
    private $committeeRepository;

    public function __construct(CommitteesRepository $committeeRepository)
    {
        $this->committeeRepository = $committeeRepository;
    }

    public function view($pageName)
    {
        return view("committees.$pageName")->with('css', 'comissoes/comissao');
    }

    public function details($id)
    {
        $committee = $this->committeeRepository->findById($id);
        return view('callcenter.committees.form')->with([
            'committee' => $committee,
            'mode' => 'update',
        ]);
    }

    public function create()
    {
        return view('callcenter.committees.form')->with([
            'committee' => $this->committeeRepository->new(),
            'mode' => 'create',
        ]);
    }

    public function store(CommitteeRequest $request)
    {
        $this->committeeRepository->createFromRequest($request);

        $this->showSuccessMessage('Comissão cadastrada com sucesso.');

        return redirect()->route('committees.index');
    }

    public function index()
    {
        return view('callcenter.committees.index')->with(
            'committees',
            $this->committeeRepository->allPaginate()
        );
    }
}
