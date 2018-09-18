<?php
namespace App\Http\Controllers\CallCenter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProgressRequest;
use Illuminate\Support\Facades\Auth;

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
        $this->progressesRepository->createFromRequest($request); //->sendNotifications();

        return redirect()
            ->route('records.show', ['id' => $request->get('record_id')])
            ->with($this->getSuccessMessage());
    }

    public function storeAndFinish(ProgressRequest $request)
    {
        $progress = $this->progressesRepository->createFromRequest($request); //->sendNotifications();

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
        $progress = $this->progressesRepository->createFromRequest($request); //->sendNotifications();

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
}
