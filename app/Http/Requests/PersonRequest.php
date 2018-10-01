<?php
namespace App\Http\Requests;

class PersonRequest extends Request
{
    protected $errorBag = 'validation';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cpf_cnpj' => 'required_if:person_id,null|cpf_cnpj',
            'name' => 'required',
            'identification' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return ['unique' => 'Este CPF já consta da nossa base de dados'];
    }

    /**
     * @return array
     */
    public function sanitize()
    {
        if (!empty($this->get('cpf_cnpj'))) {
            $input = $this->all();

            $input['cpf_cnpj'] = only_numbers($input['cpf_cnpj']);

            $this->replace($input);
        }

        return $this->all();
    }
}
