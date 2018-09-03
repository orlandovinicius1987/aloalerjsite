<?php
namespace App\Data\Repositories;

use Validator;
use App\Data\Models\Person;
use Illuminate\Support\Facades\Cache;

class People extends BaseRepository
{
    const RECORDS_COUNT_LIMIT = 20;

    /**
     * @var $model
     */
    protected $model = Person::class;

    private function emptyResponse()
    {
        return $this->response([], 0);
    }

    protected function error($count, $messages)
    {
        return $this->response(null, $count, $messages);
    }

    protected function getBaseQuery()
    {
        return $this->model::with(['contacts', 'addresses', 'records'])->take(
            static::RECORDS_COUNT_LIMIT + 1
        );
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
        if (!$this->validCpfCnpj($string)) {
            return $this->emptyResponse();
        }

        $query = $this->getBaseQuery()->where(
            'cpf_cnpj',
            only_numbers($string)
        );

        return $this->response($query->get(), $query->count());
    }

    protected function searchByName($string)
    {
        $query = $this->getBaseQuery()->whereRaw(
            "unaccent(name) ILIKE '%'||unaccent('{$string}')||'%' "
        );

        if ($query->count() > static::RECORDS_COUNT_LIMIT) {
            return $this->error(
                $query->count(),
                'Busca resultou em mais de 20 registros'
            );
        }

        return $this->response($query->get(), $query->count());
    }

    public function searchByEverything($string)
    {
        if (empty(trim($string))) {
            return $this->emptyResponse();
        }

        return Cache::tags(['search'])->remember($string, 10, function () use (
            $string
        ) {
            $result = $this->searchByCpf($string);

            if ($result['success'] && $result['count'] > 0) {
                $result['foundBy'] = 'cpf_cnpj';
                return $result;
            }

            $result = $this->searchByProtocolNumber($string);

            if ($result['success'] && $result['count'] > 0) {
                $result['foundBy'] = 'protocol';
                return $result;
            }

            $result = $this->searchByName($string);

            if ($result['success'] && $result['count'] > 0) {
                $result['foundBy'] = 'name';
                return $result;
            }

            $result['foundBy'] = '';
            return $result;
        });
    }

    public function validCpfCnpj($string)
    {
        return Validator::make(
            ['string' => $string],
            [
                'string' => 'required|cpf_cnpj',
            ]
        )->passes();
    }
}
