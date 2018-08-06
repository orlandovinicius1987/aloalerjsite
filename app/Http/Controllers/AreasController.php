<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ViaRequest;
use App\Data\Repositories\ViasRepository;

class AreasController extends Controller
{
    /**
     * @param Request     $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('areas.index')
            ->with('pesquisa', $request->get('pesquisa'))
            ->with('areas', $this->repository->search($request));
    }

    /**
     * @return $this
     */
    public function create()
    {
        return view('areas.form')->with(['area' => $this->repository->new()]);
    }

    /**
     * @param Request     $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ViaRequest $request)
    {
        $this->repository->createFromRequest($request);

        return redirect()
            ->route('areas.index')
            ->with($this->getSuccessMessage());
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function show($id)
    {
        return view('areas.form')
            ->with('formDisabled', true)
            ->with(['area' => $this->repository->findById($id)]);
    }
}
