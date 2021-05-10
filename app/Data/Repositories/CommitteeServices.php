<?php

namespace App\Data\Repositories;

use App\Data\Models\CommitteeService;
use App\Data\Models\ViaModel;

class CommitteeServices extends Base
{
    /**
     * @var $model
     */
    protected $model = CommitteeService::class;

    public function getPublicServices()
    {
        return $this->model
            ::where('public', true)
            ->orderBy('link_caption', 'asc')
            ->get();
    }
}
