<?php

namespace App\Data\Presenters;

class AttachedFile extends Base
{
    public function download_link()
    {
        $id = $this->wrappedObject->id;

        return route('attachedFiles.download', [
            'id' => $id,
        ]);
    }
}
