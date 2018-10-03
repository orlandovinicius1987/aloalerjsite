<?php
namespace App\Http\Controllers\CallCenter;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProgressRequest;
use App\Data\Repositories\Files as FilesRepository;

use Illuminate\Support\Facades\Response;
use Mockery\Exception;

class Files extends Controller
{
    /**
     * @return JsonResponse
     */
    public function upload(Request $request)
    {
        try {
            $filesRepository = app(FilesRepository::class);

            if (!isset($request->allFiles()['file'])) {
                throw new Exception();
            }

            $file = $request->allFiles()['file'];

            $hash = hash('sha1', file_get_contents($file->getPathName()));
            $file->move(
                storage_path(),
                $hash . '.' . $file->getClientOriginalExtension()
            );

            $request->merge([
                'url' =>
                    storage_path() .
                        '/' .
                        $hash .
                        '.' .
                        $file->getClientOriginalExtension(),
                'sha1_hash' => $hash,
            ]);

            $row = $filesRepository->findByColumn('sha1_hash', $hash);
            if (!$row) {
                $row = $filesRepository->createFromRequest($request);
            }

            return Response::json(
                [
                    'message' => 'File saved Successfully',
                    'fileName' => $row->sha1_hash,
                    'url' => $row->url,
                    'file_id' => $row->id,
                    'hashContent' => $row->sha1_hash,
                    'extension' => $file->getClientOriginalExtension(),
                ],
                200
            );
        } catch (Exception $e) {
            return Response::json(
                [
                    'message' => 'Exception',
                ],
                500
            );
        }
    }

    public function download($id)
    {
        $file = app(FilesRepository::class)->findById($id);
        return response()->download($file->url);
    }
}
