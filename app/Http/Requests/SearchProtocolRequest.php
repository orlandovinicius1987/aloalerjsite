<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Rules\ValidatePublicSearch;

class SearchProtocolRequest extends Request
{
    public function rules()
    {
        return [
            'protocol' => 'required|exists:records,protocol',
            'access_code' => new ValidatePublicSearch($this->all()),
        ];
    }

    public function messages()
    {
        return ['protocol.exists' => 'Dados inválidos', 'access_code.exists' => 'Dados inválidos'];
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
        if (!empty($this->get('access_code'))) {
            $input = $this->all();
            $input['access_code'] = strtoupper($input['access_code']);
            $this->replace($input);
        }

        return $this->all();
    }
}

?>
