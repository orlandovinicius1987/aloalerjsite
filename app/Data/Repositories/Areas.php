<?php
namespace App\Data\Repositories;

use App\Data\Models\Area;
use App\Data\Models\ViaModel;

class Areas extends Base
{
    /**
     * @var $model
     */
    protected $model = Area::class;

    public function getAreas()
    {
        return Areas::class;
    }
}
