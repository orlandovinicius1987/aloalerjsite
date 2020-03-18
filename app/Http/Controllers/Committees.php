<?php
namespace App\Http\Controllers;

use App\Data\Repositories\Committees as CommitteesRepository;

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
        return view("committees.$pageName")->with('css', 'comissoes/comissao')
            ->with(
                'committeeServices',
                $this->getPublicCommitteeServices()
            );;
    }

    public function show($id)
    {
        return view('committees.show')->with(
            'committee',$this->committeeRepository->findById($id))
                ->with(
            'committeeServices',
                $this->getPublicCommitteeServices()
        );
    }
}
