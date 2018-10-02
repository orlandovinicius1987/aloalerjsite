<?php

namespace App\Data\Presenters;

class File extends Base
{
    public function download_link()
    {
        $id = $this->wrappedObject->id;

        return route('files.download', [
            'id' => $id,
        ]);
    }
}
