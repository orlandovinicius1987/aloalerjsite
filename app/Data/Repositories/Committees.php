<?php
namespace App\Data\Repositories;

use App\Data\Models\Committee;
use App\Data\Models\ViaModel;

class Committees extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = Committee::class;

    public function findBySlug($slug)
    {
        return Committee::where('slug', $slug)->first();
    }
}
