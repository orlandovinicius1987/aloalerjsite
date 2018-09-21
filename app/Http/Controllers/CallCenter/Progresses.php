<?php
namespace App\Http\Controllers\CallCenter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProgressRequest;

class Progresses extends Controller
{
    /**
     * @return $this
     */
    public function create($record_id)
    {
        return view('callcenter.progress.form')
            ->with([
                'progress' => $this->progressesRepository->new(),
                'record' => $this->recordsRepository->findById($record_id),
            ])
            ->with($this->getComboBoxMenus())
            ->with('formDisabled', false);
    }

    /**
     * @param Request     $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProgressRequest $request)
    {
        $request->merge(['created_by_id' => Auth::user()->id]);
        $this->progressesRepository->createFromRequest(
            $request
        )->sendNotifications();

        return redirect()
            ->route('records.show', ['id' => $request->get('record_id')])
            ->with($this->getSuccessMessage());
    }

    public function storeAndFinish(ProgressRequest $request)
    {
        $request->merge(['created_by_id' => Auth::user()->id]);
        $progress = $this->progressesRepository->createFromRequest(
            $request
        )->sendNotifications();

        $this->recordsRepository->markAsResolved(
            $request->get('record_id'),
            $progress
        );

        return redirect()
            ->route('records.show', ['id' => $request->get('record_id')])
            ->with($this->getSuccessMessage());
    }

    public function storeAndOpen(ProgressRequest $request)
    {
        $request->merge(['created_by_id' => Auth::user()->id]);

        $progress = $this->progressesRepository->createFromRequest($request);

        $progress->sendNotifications();

        $this->recordsRepository->markAsNotResolved(
            $request->get('record_id'),
            $progress
        );

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
        $progress = $this->progressesRepository->findById($id);

        $formDisabled = true;
        // Se a diferença entre a Data de criação e a data atual for igual a 0 dias de diferença, então foi criado hoje
        $isCreatedToday = date_diff($progress->created_at, now())->days == 0;
        $isSameUser = $progress->created_by_id == Auth::user()->id;
        if ($isCreatedToday && $isSameUser) {
            $formDisabled = false;
        }

        return view('callcenter.progress.form')
            ->with([
                'progress' => $progress,
                'record' => $this->recordsRepository->findById(
                    $progress->record_id
                ),
            ])
            ->with($this->getComboBoxMenus())
            ->with('formDisabled', $formDisabled);
    }

    public function notify($id)
    {
        $this->progressesRepository->findById($id)->sendNotifications()
            ? $this->flashMessage('Cidadão foi nofificado')
            : $this->flashMessage(
                'Este cidadão não tem nenhum endereço que possamos usar para notificá-lo',
                'danger'
            );

        return redirect()->back();
    }
}
