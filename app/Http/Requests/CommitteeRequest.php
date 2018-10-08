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
            'phone' => 'required',
            'bio' => 'required',
            'president' => 'required',
            'vice_president' => 'required',
            'office_phone' => 'required',
            'office_address' => 'required',
            'public',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'required_without' => 'O campo solicitação não pode ser vazio.',
        ];
    }
}
