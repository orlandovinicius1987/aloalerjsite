<?php
namespace App\Http\Requests;

class CallRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ['cpf_cnpj' => 'required', 'name' => 'required'];
    }
}
