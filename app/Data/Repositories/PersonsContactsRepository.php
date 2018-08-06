<?php

namespace App\Data\Repositories;

use App\Data\Models\PersonAddressModel;
use App\Data\Models\PersonContactModel;
use App\Data\Models\PersonModel;

class PersonsContactsRepository extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = PersonContactModel::class;

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
