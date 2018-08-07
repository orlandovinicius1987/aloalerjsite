<?php
namespace App\Data\Repositories;

use App\Data\Models\Person;

class People extends BaseRepository
{
    /**
     * @var $model
     */
    protected $model = Person::class;

    private function error($count, $messages)
    {
        return $this->response(null, $count, $messages);
    }

    private function getBaseQuery()
    {
        return $this->model::with(['contacts', 'addresses']);
    }

    private function response($data, $count = 0, $messages = null)
    {
        return [
            'data' => $data,
            'success' => is_null($messages) || count($messages) == 0,
            'errors' => $messages,
            'count' => $count,
        ];
    }

    private function searchByCpf($string)
    {
        $query = $this->getBaseQuery()->where('cpf_cnpj', $string);

        return $this->response($query->get(), $query->count());
    }

    private function searchByName($string)
    {
        $query = $this->getBaseQuery()->where(
            'name',
            'ILIKE',
            '%' . $string . '%'
        );

        if (($count = $query->count()) > 20) {
            return $this->error(
                $count,
                'Busca resultou em mais de 20 registros'
            );
        }

        return $this->response($query->get(), $count);
    }

    public function searchByEverything($string)
    {
        $result = $this->searchByCpf($string);

        if ($result['success'] && $result['count'] > 0) {
            return $result;
        }

        return $this->searchByName($string);
    }
}
