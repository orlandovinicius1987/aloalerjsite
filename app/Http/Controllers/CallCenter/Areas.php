<?php
namespace App\Http\Controllers\Callcenter;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRequest;
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

    public function index()
    {
        return view('callcenter.areas.index')->with('areas', $this->areasRepository->all());
    }

    public function details($id)
    {
        $area = $this->areasRepository->findById($id);
        return view('callcenter.areas.form')->with(['area' => $area, 'mode' => 'update']);
    }

    public function create()
    {
        return view('callcenter.areas.form')->with([
            'area' => $this->areasRepository->new(),
            'mode' => 'create',
        ]);
    }

    public function store(AreaRequest $request)
    {
        $this->areasRepository->createFromRequest($request);

        $this->showSuccessMessage('Assunto cadastrado com sucesso.');

        return redirect()->route('areas.index');
    }
}
