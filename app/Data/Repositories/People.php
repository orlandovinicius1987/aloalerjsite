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

    private function addExtraInfo($people)
    {
        return $people;
        return $people->map(function ($person) {
            $person->records = $person->records->map(function ($record) {
                $record->protocol_formatted = $record->presenter()
                    ->protocol_formatted;
            });

            return $person;
        });
    }

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
        if (empty(trim($string))) {
            return null;
        }

        $record = app(Records::class)->findByProtocol($string);

        if ($record) {
            $query = $this->getBaseQuery()->where('id', $record->person_id);

            return $this->response($query->get(), $query->count());
        }

        return $this->response(null);
    }

    protected function searchByCpf($string)
    {
        if (empty(trim($string))) {
            return null;
        }

        if (!$this->validCpfCnpj($string)) {
            return $this->emptyResponse();
        }

        $query = $this->getBaseQuery()->where(
            'cpf_cnpj',
            only_numbers($string)
        );

        return $this->response(
            $this->addExtraInfo($query->get()),
            $query->count()
        );
    }

    protected function searchByName($string)
    {
        if (empty(trim($string))) {
            return null;
        }

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

    public function searchByEverything($search)
    {
        $result = $this->emptyResponse();

        $name = $search['name'];

        $cpf_cnpj = $search['cpf_cnpj'];

        $search = $cpf_cnpj . $name;

        if (empty(trim($search))) {
            return $result;
        }

        $result['foundByCpfCnpj'] = false;

        if ($cpf_cnpj) {
            $foundCpfCnpj = $this->searchByCpf($cpf_cnpj);

            if ($foundCpfCnpj['success'] && $foundCpfCnpj['count'] > 0) {
                $foundCpfCnpj['foundByCpfCnpj'] = true;
                return $foundCpfCnpj;
            }

            $protocol = $this->searchByProtocolNumber($cpf_cnpj);

            $result['errors'] = $result['errors'] ?: $protocol['errors'];

            if (!is_null($protocol['data'])) {
                $result['data'] = coollect($result['data'])->merge(
                    $protocol['data']
                );
            }
        }

        $name = $this->searchByName($name);
        $result['errors'] = $result['errors'] ?: $name['errors'];

        if (!is_null($name['data'])) {
            $result['data'] = coollect($result['data'])->merge($name['data']);
        }

        return $result;
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
