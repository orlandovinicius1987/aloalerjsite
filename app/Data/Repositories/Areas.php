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

    public function searchByEverything($search)
    {
        return ($result = $this->searchByAll($search))->count() == 0
            ? $this->emptyResponse()
            : $this->response($result);
    }

    public function searchByAll($name)
    {
        return $this->model
            ::Where('name', 'ilike', '%' . $name . '%')
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
            'count' => $count,
        ];
    }

}
