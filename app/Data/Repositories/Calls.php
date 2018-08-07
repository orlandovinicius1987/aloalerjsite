<?php
namespace App\Data\Repositories;

use App\Data\Models\Call;

class Calls extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = Call::class;

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
