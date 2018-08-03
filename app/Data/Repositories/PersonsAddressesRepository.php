<?php

namespace App\Data\Repositories;

use App\Data\Models\PersonAddressModel;
use App\Data\Models\PersonModel;

class PersonsAddressesRepository extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = PersonAddressModel::class;

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
