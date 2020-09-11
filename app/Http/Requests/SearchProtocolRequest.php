<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class SearchProtocolRequest extends Request
{
    public function rules()
    {
        return [
            'protocolo' => 
                'required|exists:records,protocol',
        ];
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