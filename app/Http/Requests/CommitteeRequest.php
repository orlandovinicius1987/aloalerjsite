<?php
namespace App\Http\Requests;

class CommitteeRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'short_name' => 'required',
            'link_caption' => 'required',
            'phone' => 'required',
            'bio' => 'required',
            'president' => 'required',
            'vice_president' => 'required',
            'office_phone' => 'required',
            'office_address' => 'required',
            'public',
            'email' => 'required|email',
            //'origin_id' => 'required',
            //'original' => 'required_without:record_id',
            // 'progress_type_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required_without' => 'O campo solicitação não pode ser vazio.',
        ];
    }
}
