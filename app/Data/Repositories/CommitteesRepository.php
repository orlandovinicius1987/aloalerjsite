<?php
namespace App\Data\Repositories;

use App\Data\Models\Committe;
use App\Data\Models\Origin;
use App\Data\Models\Person;
use App\Data\Models\ViaModel;

class CommitteesRepository extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = Committe::class;

    public function findBySlug($slug)
    {
        return Committee::where('slug', $slug)->first();
    }
}
