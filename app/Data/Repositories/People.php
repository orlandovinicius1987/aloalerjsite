<?php

namespace App\Data\Repositories;

use App\Data\Models\Person;
use Illuminate\Support\Facades\Cache;

class People extends Base
{
    const RECORDS_COUNT_LIMIT = 20;

    /**
     * @var $model
     */
    protected $model = Person::class;

    public function getAnonymousModel()
    {
        return Cache::remember('getAnonymousModel', 15, function () {
            return \App\Data\Models\Person::where('is_anonymous', true)->first();
        });
    }

    private function addExtraInfo($people, $relations = ['records', 'contacts', 'addresses'])
    {
        $loadArray = [];

        collect($relations)->each(function ($item) use (&$loadArray, $people) {
            $loadArray[$item] = function ($query) {
                $query->limit(15);
            };
        });

        return $people->each(function ($person) use ($loadArray) {
            $person->load($loadArray);
        });
    }

    private function emptyResponse($search = '')
    {
        return $this->response($search, [], 0, null);
    }

    protected function error($count, $messages)
    {
        return $this->response(null, null, $count, $messages);
    }

    protected function getBaseQuery()
    {
        return $this->model::take(static::RECORDS_COUNT_LIMIT + 1);
    }

    private function isNumeric($string)
    {
        return is_numeric(remove_punctuation($string));
    }

    protected function response($string, $data, $count = 0, $messages = null)
    {
        return [
            'data' => $data,
            'success' => is_null($messages),
            'errors' => $messages,
            'count' => $count,
            'is_cpf_cnpj' => validate_cpf_cnpj($string),
            'is_numeric' => $this->isNumeric($string),
        ];
    }

    protected function searchByProtocolNumber($string)
    {
        $record = app(Records::class)->findByProtocol($string);

        if ($record) {
            $query = $this->model
                ::with([
                    'records' => function ($query) use ($string) {
                        $query->where('protocol', '=', $string);
                    },
                ])
                ->take(static::RECORDS_COUNT_LIMIT + 1)
                ->where('id', $record->person_id);

            return $this->response(
                $string,
                $this->addExtraInfo($query->get(), ['addresses', 'contacts']),
                $query->count()
            );
        }

        return $this->emptyResponse();
    }

    public function findByCpfCnpj($cpfCnpj)
    {
        return $this->getBaseQuery()
            ->where('cpf_cnpj', only_numbers($cpfCnpj))
            ->first();
    }

    protected function searchByCpf($string)
    {
        if (!validate_cpf_cnpj($string)) {
            return $this->emptyResponse($string);
        }

        $query = $this->getBaseQuery()->where('cpf_cnpj', only_numbers($string));

        return $this->response($string, $this->addExtraInfo($query->get()), $query->count());
    }

    public function findOrCreate($data)
    {
        if (isset($data->is_anonymous) && $data->is_anonymous == 'true') {
            $person = get_anonymous_person();
        } elseif (isset($data->person_id)) {
            $person = $this->findById($data->person_id);
        } elseif ($data->cpf_cnpj) {
            $person = $this->findByCpfCnpj($data->cpf_cnpj);
        }

        if (is_null($person)) {
            $data->cpf_cnpj = only_numbers($data->cpf_cnpj);
            $person = $this->create($data->toArray());
        }
        return $person;
    }

    protected function searchByName($string)
    {
        $query = $this->getBaseQuery()->whereRaw(
            "unaccent(name) ILIKE '%'||unaccent('" . pg_escape_string($string) . "')||'%' "
        );

        if ($query->count() > static::RECORDS_COUNT_LIMIT) {
            return $this->error($query->count(), 'Busca resultou em mais de 20 registros');
        }

        /**
         *  O Perfil anônimo do legado possui 47 mil contatos, e 110 mil protocolos,
         * para evitar problemas na busca, foi inserido um limite para retornar os dados de contato e numero
         * de protocolo.
         */
        return $this->response(
            $string,

            $this->addExtraInfo($query->get()),
            $query->count()
        );
    }

    public function searchByEverything($search)
    {
        if (empty(trim($search = $search['search']))) {
            return $this->emptyResponse();
        }

        if ($this->isNumeric($search)) {
            $search = remove_punctuation($search);

            $response = $this->searchByCpf($search);

            if ($response['success'] && $response['count'] > 0) {
                return $response;
            }

            $protocol = $this->searchByProtocolNumber($search);

            $response['errors'] = $response['errors'] ?: $protocol['errors'];

            if (!is_null($protocol['data'])) {
                $response['data'] = coollect($response['data'])->merge($protocol['data']);
            }

            return $response;
        }

        return $this->searchByName($search);
    }

    public function create($data)
    {
        return Person::create($data);
    }
}
