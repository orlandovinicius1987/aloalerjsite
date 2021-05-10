<?php
namespace App\Http\Requests;

use App\Data\Repositories\ContactTypes;
use App\Rules\Contact;

use App\Data\Repositories\ContactTypes as ContactTypesRepository;

class PersonContactsRequest extends Request
{
    public function rules()
    {
        return [
            'person_id' => 'required',
            'contact_type_id' => 'required',
            'contact' => ['required', new Contact()]
        ];
    }

    /**
     * @return array
     */
    public function sanitize()
    {
        if (!empty($this->get('contact'))) {
            $contactType = app(ContactTypesRepository::class)->findById(
                $this->get('contact_type_id')
            );

            if (
                $contactType->code == 'mobile' ||
                $contactType->code == 'whatsapp' ||
                $contactType->code == 'phone'
            ) {
                $input = $this->all();
                $phone = $this->get('contact');
                $input['contact'] = preg_replace('/\D/', '', $phone);
                $this->replace($input);
            }
        }
        return $this->all();
    }
}
