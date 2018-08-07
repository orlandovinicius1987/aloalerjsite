<?php

namespace App\Data\Repositories;

use App\Data\Models\PersonAddress;
use App\Data\Models\Person;

class PersonsAddressesRepository extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = PersonAddress::class;

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
