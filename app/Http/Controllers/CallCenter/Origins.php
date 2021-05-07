<?php
namespace App\Http\Controllers\Callcenter;

use App\Http\Controllers\Controller;
use App\Http\Requests\AreaRequest;
use App\Data\Repositories\Origins as OriginsRepository;

class Origins extends Controller
{
    /**
     * @var OriginsRepository
     */
    protected $originsRepository;

    public function __construct(OriginsRepository $originsRepository)
    {
        $this->originsRepository = $originsRepository;
    }

    public function index()
    {
        return view('callcenter.origins.index')->with('origins', $this->originsRepository->all());
    }

    public function details($id)
    {
        $area = $this->originsRepository->findById($id);
        return view('callcenter.origins.form')->with(['origin' => $area, 'mode' => 'update']);
    }

    public function create()
    {
        return view('callcenter.origins.form')->with([
            'origin' => $this->originsRepository->new(),
            'mode' => 'create',
        ]);
    }

    public function store(AreaRequest $request)
    {
        $this->originsRepository->createFromRequest($request);

        $this->showSuccessMessage('Assunto cadastrado com sucesso.');

        return redirect()->route('origins.index');
    }
}
