<?php
namespace App\Http\Controllers\Callcenter;

use App\Data\Repositories\Committees as CommitteesRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommitteeRequest;
use App\Data\Repositories\Areas as AreasRepository;

class Areas extends Controller
{
    /**
     * @var AreasRepository
     */
    protected $areasRepository;

    public function __construct(AreasRepository $areasRepository)
    {
        $this->areasRepository = $areasRepository;
    }

    public function index ()
    {
        return view('callcenter.areas.index')->with('areas', $this->areasRepository->all());
        
    }
}
