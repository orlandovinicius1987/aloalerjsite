<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class SearchProtocolRequest extends Request
{
    public function rules()
    {
        return [
            'protocolo' => 'required|exists:records,protocol'
        ];
    }

    /**
     * @return array
     */

    public function sanitize()
    {
        if (!empty($this->get('protocolo'))) {
            $input = $this->all();
            $input['protocolo'] = only_numbers($input['protocolo']);
            $this->replace($input);
        }

        return $this->all();
    }
}

?>
