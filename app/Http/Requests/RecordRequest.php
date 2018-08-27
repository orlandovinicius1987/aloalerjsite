<?php
namespace App\Http\Requests;

class RecordRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'origin_id' => 'required',
            //'original' => 'required_without:record_id',
            'progress_type_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required_without' => 'O campo solicitação não pode ser vazio.',
        ];
    }
}
