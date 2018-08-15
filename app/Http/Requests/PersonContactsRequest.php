<?php
namespace App\Http\Requests;

use App\Rules\Contact;

class PersonContactsRequest extends Request
{
    public function rules()
    {
        return [
            'person_id' => 'required',
            'contact_type_id' => 'required',
            'contact' => ['required', new Contact()],
        ];
    }
}
