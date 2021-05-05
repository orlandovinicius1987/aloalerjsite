<?php
namespace App\Data\Repositories;

use App\Models\PersonAddress;

class PersonAddresses extends Base
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
