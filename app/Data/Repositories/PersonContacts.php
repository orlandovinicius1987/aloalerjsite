<?php
namespace App\Data\Repositories;

use App\Data\Models\PersonContact;

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
}
