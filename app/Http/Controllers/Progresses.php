<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProgressRequest;

class Progresses extends Controller
{
    /**
     * @param Request     $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('progresses.index')
            ->with('pesquisa', $request->get('pesquisa'))
            ->with('origins', $this->repository->search($request));
    }

    /**
     * @return $this
     */
    public function create($record_id)
    {
        return view('callcenter.progress.form')
            ->with([
                'progress' => $this->progressesRepository->new(),
                'record_id' => $record_id
            ])
            ->with($this->getComboBoxMenus());
    }

    /**
     * @param Request     $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProgressRequest $request)
    {
        $this->progressesRepository->createFromRequest($request);

        return redirect()
            ->route('records.show', ['id' => $request->get('record_id')])
            ->with($this->getSuccessMessage());
    }

    public function storeAndFinish(ProgressRequest $request)
    {
        $this->progressesRepository->createFromRequest($request);

        $this->recordsRepository->markAsResolved($request->get('record_id'));

        return redirect()
            ->route('records.show', ['id' => $request->get('record_id')])
            ->with($this->getSuccessMessage());
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function show($id)
    {
        return view('progresses.form')
            ->with('formDisabled', true)
            ->with(['via' => $this->progressesRepository->findById($id)]);
    }
}
