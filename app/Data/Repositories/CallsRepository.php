<?php

namespace App\Data\Repositories;

use App\Data\Models\CallModel;

class CallsRepository extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = CallModel::class;


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
