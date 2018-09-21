<?php
namespace App\Http\Requests;

class PersonAddressesRequest extends Request
{
    protected $errorBag = 'validation';

    public function rules()
    {
        return [
            'person_id' => 'required',
            'zipcode' => 'required',
            'street' => 'required',
            'neighbourhood' => 'required',
            'city' => 'required',
            'state' => 'required',
            'number' => 'numeric',
        ];
    }
}
