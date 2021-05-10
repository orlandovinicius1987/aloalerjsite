<?php
namespace App\Data\Repositories;

use App\Models\Origin;
use App\Models\Person;
use App\Models\ViaModel;

class Origins extends Base
{
    /**
     * @var $model
     */
    protected $model = Origin::class;

    public function searchByAll($name)
    {
        return $this->model
            ::where('name', 'ilike', '%' . $name . '%')
            ->orderBy('name', 'asc')
            ->get();
    }
}
