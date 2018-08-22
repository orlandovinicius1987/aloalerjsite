<?php
namespace App\Data\Repositories;

use App\Data\Models\Person;

class People extends BaseRepository
{
    const RECORDS_COUNT_LIMIT = 20;

    /**
     * @var $model
     */
    protected $model = Person::class;

    protected function error($count, $messages)
    {
        return $this->response(null, $count, $messages);
    }

    protected function getBaseQuery()
    {
        return $this->model::with(['contacts', 'addresses', 'records']);
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

    protected function searchByProtocolNumber($string)
    {
        $record = app(Records::class)->findByColumn('protocol', $string);
        if ($record) {
            $query = $this->getBaseQuery()->where('id', $record->person_id);
            return $this->response($query->get(), $query->count());
        }
        return $this->response(null);
    }

    protected function searchByCpf($string)
    {
        $query = $this->getBaseQuery()->where('cpf_cnpj', $string);

        return $this->response($query->get(), $query->count());
    }

    protected function searchByName($string)
    {
        $query = $this->getBaseQuery()
            ->where('name', 'ILIKE', '%' . $string . '%')
            ->take(static::RECORDS_COUNT_LIMIT + 1);

        if (($count = $query->count()) > static::RECORDS_COUNT_LIMIT) {
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

        $result = $this->searchByProtocolNumber($string);

        if ($result['success'] && $result['count'] > 0) {
            return $result;
        }

        return $this->searchByName($string);
    }
}
