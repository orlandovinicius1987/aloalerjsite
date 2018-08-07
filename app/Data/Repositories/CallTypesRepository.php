<?php
namespace App\Data\Repositories;

use App\Data\Models\CallType;
use App\Data\Models\Committe;
use App\Data\Models\Origin;
use App\Data\Models\Person;
use App\Data\Models\ViaModel;

class CallTypesRepository extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = CallType::class;
}
