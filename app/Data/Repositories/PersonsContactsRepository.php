<?php

namespace App\Data\Repositories;

use App\Data\Models\PersonAddress;
use App\Data\Models\PersonContact;
use App\Data\Models\Person;

class PersonsContactsRepository extends BaseRepository
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
