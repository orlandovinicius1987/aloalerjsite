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

    public function searchByAll($name)
    {
        return $this->model
            ::where('name', 'ilike', '%' . $name . '%')
            ->orderBy('name', 'asc')
            ->get();
    }

    protected function emptyResponse($search = '')
    {
        return $this->response($search, 0, null);
    }

    protected function response($data, $count = 0, $messages = null)
    {
        return [
            'data' => $data,
            'success' => is_null($messages),
            'errors' => $messages,
            'count' => $count
        ];
    }
}
