<?php
namespace App\Http\Requests;

use App\Rules\Contact;
use App\Rules\ContactWorkflow;

class PersonContactsWorkflowRequest extends Request
{
    public function rules()
    {
        return [
            //'contact_type_id' => 'required',
            'mobile' => ['required', new ContactWorkflow()],
            'whatsapp' => ['required', new ContactWorkflow()],
            'email' => ['required', new ContactWorkflow()],
            'phone' => ['required', new ContactWorkflow()]
        ];
    }
}
