<?php

namespace App\Http\Controllers\Api;

use App\Data\Repositories\Files as FilesRepository;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Mimey\MimeTypes;
use App\Services\ConversionMimeIcon;

class File extends Controller
{
    public function convertExtensionToIcon(Request $request)
    {
        $extension = $request->get('extension');
        $mimes = new MimeTypes();

        $mime = $mimes->getMimeType($extension);
        $icon = ConversionMimeIcon::mimeToClass($mime);

        $messages = null;

        return [
            'success' => is_null($messages),
            'errors' => $messages,
            'extension' => $extension,
            'mime' => $mime,
            'iconClass' => $icon
        ];
    }
}
