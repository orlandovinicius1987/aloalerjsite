<?php

namespace App\Http\Requests;

class Contact extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required', //ok
            'telephone' => 'required', //ok
            'cpf' => 'required|cpf_cnpj', //ok
            'message' => 'required', //ok
        ];
    }

    /**
     * @return array
     */
    public function sanitize()
    {
        if (!empty($this->get('cpf'))) {
            $input = $this->all();

            $input['cpf'] = only_numbers($input['cpf']);

            $this->replace($input);
        }

        if (!empty($this->get('identidade'))) {
            $input = $this->all();

            $input['identidade'] = only_numbers($input['identidade']);

            $this->replace($input);
        }

        if (!empty($this->get('telephone'))) {
            $input = $this->all();

            $input['telephone'] = only_numbers($input['telephone']);

            $this->replace($input);
        }

        return $this->all();
    }
}
