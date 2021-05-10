<?php
namespace App\Http\Controllers\CallCenter;

use App\Data\Repositories\CommitteeServices as CommitteeServicesRepository;
use App\Data\Repositories\Committees as CommitteesRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommitteeServiceRequest;
use App\Http\Requests\Request;

class CommitteeServices extends Controller
{
    /**
     * @var CommitteeRepository
     */
    protected $committeeServicesRepository;
    protected $committeesRepository;

    public function __construct(
        CommitteeServicesRepository $committeeServicesRepository,
        CommitteesRepository $committeesRepository
    ) {
        $this->committeeServicesRepository = $committeeServicesRepository;
        $this->committeesRepository = $committeesRepository;
    }

    public function view($pageName)
    {
        return view("committees.$pageName")->with('css', 'comissoes/comissao');
    }

    public function details($id)
    {
        $committeeService = $this->committeeServicesRepository->findById($id);
        $committee = $this->committeesRepository->findById($committeeService->committee_id);
        return view('callcenter.committee_services.form')->with([
            'committeeService' => $committeeService,
            'committee' => $committee,
        ]);
    }

    public function create($committee_id)
    {
        $committee = $this->committeesRepository->findById($committee_id);
        return view('callcenter.committee_services.form')->with([
            'committeeService' => $this->committeeServicesRepository->new(),
            'committee' => $committee,
        ]);
    }

    public function store(CommitteeServiceRequest $request)
    {
        $this->committeeServicesRepository->createFromRequest($request);

        $this->showSuccessMessage('Serviço cadastrado com sucesso.');

        return redirect()->route('committees.index');
    }

    public function index()
    {
        return view('callcenter.committees.index')->with(
            'committees',
            $this->committeeServicesRepository->allPaginate()
        );
    }
}
