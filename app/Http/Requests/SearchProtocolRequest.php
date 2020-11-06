<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class SearchProtocolRequest extends Request
{
    public function rules()
    {
        return [
            'protocol' => 'required|exists:records,protocol',
            'access_code' => ['required', Rule::exists('records')
                ->where('protocol', $this->get('protocol'))
                ->where('access_code', $this->get('access_code'))]
        ];
    }

    public function messages()
    {
        return [ 'protocol.exists' => 'Dados inválidos',
                 'access_code.exists' => 'Dados inválidos'];
    }

    /**
     * @return array
     */

    public function sanitize()
    {
        if (!empty($this->get('protocol'))) {
            $input = $this->all();
            $input['protocol'] = only_numbers($input['protocol']);
            $this->replace($input);
        }

        return $this->all();
    }
}

?>
