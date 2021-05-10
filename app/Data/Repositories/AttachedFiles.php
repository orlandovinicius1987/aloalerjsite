<?php
namespace App\Data\Repositories;

use App\Models\AttachedFile;
use App\Http\Requests\AttachedFileRequest;

class AttachedFiles extends Base
{
    /**
     * @var $model
     */
    protected $model = AttachedFile::class;

    public function createFromArray($array)
    {
        $attachedFileRequest = new AttachedFileRequest();

        $attachedFileRequest->setMethod('POST');

        $attachedFileRequest->request->add($array);

        //Anexa o arquivo
        $this->createFromRequest($attachedFileRequest);
    }
}
