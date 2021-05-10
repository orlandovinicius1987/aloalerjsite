<?php
namespace App\Http\Requests;

use App\Rules\Contact;
use App\Rules\ContactWorkflow;

class PersonContactsWorkflowRequest extends Request
{
    protected $errorBag = 'validation';

    public function rules()
    {
        return [
            //'contact_type_id' => 'required',
            'mobile' => ['required_without_all:whatsapp,phone', new ContactWorkflow()],
            'whatsapp' => ['required_without_all:mobile,phone', new ContactWorkflow()],
            'email' => [new ContactWorkflow()],
            'phone' => ['required_without_all:mobile,whatsapp', new ContactWorkflow()],
        ];
    }
}
