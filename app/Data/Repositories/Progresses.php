<?php
namespace App\Data\Repositories;

use App\Data\Models\Progress;
use App\Data\Repositories\AttachedFiles as AttachedFilesRepository;

class Progresses extends Base
{
    /**
     * @var $model
     */
    protected $model = Progress::class;

    public function attachFilesFromRequest($request, $progress_id)
    {
        $attachedFilesRepository = app(AttachedFilesRepository::class);

        foreach ($request->get('files_array') as $file) {
            $file = (array) $file;

            $file['progress_id'] = $progress_id;

            $attachedFilesRepository->createFromArray($file);
        }
    }
}
