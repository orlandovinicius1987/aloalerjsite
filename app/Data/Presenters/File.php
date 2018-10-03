<?php

namespace App\Data\Presenters;
use Mimey\MimeTypes;
use App\Services\ConversionMimeIcon;

class File extends Base
{
    public function download_link()
    {
        $id = $this->wrappedObject->id;

        return route('files.download', [
            'id' => $id,
        ]);
    }

    public function icon()
    {
        $extension = $this->wrappedObject->extension;
        $mimes = new MimeTypes;

        return ConversionMimeIcon::mimeToClass($mimes->getMimeType($extension));
    }
}
