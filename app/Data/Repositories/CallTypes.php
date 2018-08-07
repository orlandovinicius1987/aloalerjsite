<?php
namespace App\Data\Repositories;

use App\Data\Models\CallType;
use App\Data\Models\ViaModel;

class CallTypes extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = CallType::class;
}
