<?php
namespace App\Data\Repositories;

use App\Data\Models\RecordType;
use App\Data\Models\ViaModel;

class RecordTypes extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = RecordType::class;
}
