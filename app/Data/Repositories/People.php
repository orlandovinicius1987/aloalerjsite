<?php
namespace App\Data\Repositories;

use App\Data\Models\Person;

class People extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = Person::class;

    private function searchByCpf($string)
    {
        return $this->model::with(['contacts', 'addresses'])
            ->where('cpf_cnpj', $string)
            ->get();
    }

    private function searchByName($string)
    {
        return $this->model::where('name', 'like', $string . '%')->get();
    }

    public function searchByEverything($string)
    {
        if ($result = $this->searchByCpf($string)) {
            return $result;
        }

        return $this->searchByName($string);
    }
}
