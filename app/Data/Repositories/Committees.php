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

    public function getCommitteeCombobox($id = null)
    {
        if (is_null($id)) {
            return $this->allWhereOperator('bio', '<>', '');
        } else {
            return $this->findById($id);
        }
    }

    public function findBySlug($slug)
    {
        return Committee::where('slug', $slug)->first();
    }

    public function comboBoxItemsWithScope()
    {
        return $this->model::permittedCommittees()
            ->where('bio', '<>', '')
            ->get();
    }

    public function searchByEverything($search)
    {
        $result = $this->emptyResponse();

        $name = $search;

        $resultName = $this->searchByName($name);
        if (!is_null($resultName)) {
            $result['data'] = coollect($result['data'])->merge($resultName);
        }

        return $result;
    }

    public function searchByName($name)
    {
        return $this->model::where('name', 'ilike', '%' . $name . '%')->get();
    }
}
