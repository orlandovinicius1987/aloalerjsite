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
        return view("committees.$pageName")->with('css', 'comissoes/comissao');
    }

    public function show($committeeName)
    {
        return view('committees.show', [
            'committee' => $this->committeeRepository->findBySlug($committeeName)
        ]);
    }
}
