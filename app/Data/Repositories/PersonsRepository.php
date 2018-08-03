<?php

namespace App\Data\Repositories;

use App\Data\Models\PersonModel;

class PersonsRepository extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = PersonModel::class;


}
