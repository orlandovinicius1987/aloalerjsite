<?php
namespace App\Http\Requests;

class PersonContactsRequest extends Request
{
    public function rules()
    {
        return ['person_id' => 'required', 'contact_type_id' => 'required'];
    }
}
