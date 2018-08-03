<?php
namespace App\Http\Controllers;

use App\Data\Models\PersonModel;
use App\Data\Repositories\PersonsRepository;
use App\Data\Repositories\OriginsRepository;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\ViaRequest;
use Illuminate\Http\Request;

class OriginsController extends BaseController
{
    /**
     * @param Request     $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('origins.index')
            ->with('pesquisa', $request->get('pesquisa'))
            ->with('origins', $this->repository->search($request));
    }

    /**
     * @return $this
     */
    public function create()
    {
        return view('origins.form')->with(['via' => $this->repository->new()]);
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
            ->route('origins.index')
            ->with($this->getSuccessMessage());
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function show($id)
    {
        return view('origins.form')
            ->with('formDisabled', true)
            ->with(['via' => $this->repository->findById($id)]);
    }
}
