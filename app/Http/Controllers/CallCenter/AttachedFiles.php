<?php
namespace App\Http\Controllers\CallCenter;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AttachedFileRequest;
use App\Data\Repositories\AttachedFiles as AttachedFilesRepository;

use Illuminate\Support\Facades\Response;
use Mockery\Exception;

class AttachedFiles extends Controller
{
    public function attach(AttachedFileRequest $request)
    {
        $attachedFilesRepository = app(AttachedFilesRepository::class);
        $attachedFile = $attachedFilesRepository->createFromRequest($request);
    }
}
