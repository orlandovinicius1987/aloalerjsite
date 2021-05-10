<?php
namespace App\Data\Repositories;

use App\Data\Models\ContactType;
use App\Data\Models\PersonContact;
use App\Http\Requests\PersonContactsWorkflowRequest;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\RecordRequest;

class PersonContacts extends Base
{
    /**
     * @var $model
     */
    protected $model = PersonContact::class;

    /**
     * @param person_id
     *
     * @return mixed
     */
    public function findByPerson($person_id)
    {
        return $this->model::where('person_id', $person_id)->get();
    }

    public function createContact($contact, $person_id, $code)
    {
        if (!is_null($contact)) {
            if ($code != 'email') {
                $contact = only_numbers($contact);
            }
            return PersonContact::firstOrCreate([
                'person_id' => $person_id,
                'contact_type_id' => ContactType::where('code', $code)->first()->id,
                'contact' => $contact
            ]);
        }
    }

    /**
     * @param PersonRequest $request
     */
    public function createPersonContact(PersonContactsWorkflowRequest $request, $code)
    {
        $contact = $request->get($code);
        if ($code != 'email') {
            $contact = only_numbers($contact);
        }
        if ($request->get($code)) {
            return PersonContact::create([
                'person_id' => $request->get('person_id'),
                'contact_type_id' => ContactType::where('code', $code)->first()->id,
                'contact' => $contact
            ]);
        }
    }
}
