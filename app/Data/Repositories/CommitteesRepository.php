<?php
namespace App\Data\Repositories;

use App\Data\Models\CommitteModel;
use App\Data\Models\OriginModel;
use App\Data\Models\PersonModel;
use App\Data\Models\ViaModel;

class CommitteesRepository extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = CommitteModel::class;
}
