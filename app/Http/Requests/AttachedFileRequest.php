<?php
namespace App\Http\Requests;

class AttachedFileRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file_id' => 'required|exists:files,id',
            'progress_id' => 'required|exists:progresses,id'
        ];
    }
}
