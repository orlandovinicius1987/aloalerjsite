<?php
namespace App\Data\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

abstract class Base
{
    /**
     * @var
     */
    protected $model;

    /**
     * @param Request $request
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function search(Request $request)
    {
        return $this->searchFromRequest($request->get('pesquisa'));
    }

    /**
     * @param mixed $request
     *
     * @return mixed
     */
    public function createFromRequest($data)
    {
        if ($data instanceof Request) {
            $data = coollect($data->all());
        }

        !$data->has('id') || is_null($data->id)
            ? $model = new $this->model()
            : $model = $this->model::find($data->id);

        $model->fill($data->toArray());

        $model->save();

        return $model;
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function create($data)
    {
        $model = is_null($id = isset($data['id']) ? $data['id'] : null)
            ? new $this->model()
            : $this->model::find($id);

        $model->fill($data);

        $model->save();

        return $model;
    }

    /**
     * @param array $search
     * @param array $attributes
     *
     * @return mixed
     */
    public function firstOrCreate(array $search, array $attributes = [])
    {
        return $this->model::firstOrCreate($search, $attributes);
    }

    /**
     * @param $abreviacao
     *
     * @return mixed
     */
    public function findByAbreviacao($abreviacao)
    {
        return $this->model::where('abreviacao', $abreviacao)->first();
    }

    /**
     * @param $user_id
     *
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model::where('id', $id)->first();
    }

    public function maxId()
    {
        return $this->model::max('id');
    }

    /**
     * @param $attribute
     * @param $sign
     * @param $value
     *
     * @return mixed
     */
    public function whereNull($attribute)
    {
        return $this->model::whereNull($attribute);
    }

    /**
     * @return mixed
     */
    public function new()
    {
        return new $this->model();
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->makeResultForSelect($this->model::all());
    }

    public function allOrderBy($field)
    {
        return ($this->model::orderBy($field))->get();
    }

    /**
     * @param $string
     *
     * @return mixed
     */
    public function cleanString($string)
    {
        return str_replace(["\n"], [''], $string);
    }

    /**
     * @param Request $request
     * @param $model
     */
    protected function saveTags($request, $model)
    {
        if (isset($request['tags'])) {
            $model->syncTags($request['tags']);
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public function findByName($name)
    {
        return $this->model::where('name', $name)->first();
    }

    /**
     * @param $column
     * @param $value
     *
     * @return mixed
     */
    public function findByColumn($column, $value)
    {
        return $this->model::where($column, $value)->first();
    }

    public function allWhereOperator($column, $operator, $value)
    {
        return $this->model::where($column, $operator, $value)->get();
    }

    public function allPaginate($sizeOfPage = 15)
    {
        return $this->model::paginate($sizeOfPage);
    }

    public function allWherePaginate($field, $value, $sizeOfPage = 15)
    {
        return (
            $this->model::where($field, $value)
                ->orderBy('created_at', 'desc')
                ->paginate($sizeOfPage)
        );
    }

    public function whereIsNullPaginate($field, $sizeOfPage = 15)
    {
        return ($this->model::whereNull($field)->paginate($sizeOfPage));
    }

    /**
     * @param $result
     * @param string $label
     * @param string $value
     *
     * @return mixed
     */
    protected function makeResultForSelect(
        $result,
        $label = 'name',
        $value = 'id'
    ) {
        return $result->map(function ($row) use ($value, $label) {
            $row['text'] = empty($row->text) ? $row[$label] : $row->text;

            $row['value'] = $row[$value];

            return $row;
        });
    }

    /**
     * @param null|string $search
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function searchFromRequest($search = null)
    {
        $search = is_null($search)
            ? collect()
            : collect(explode(' ', $search))->map(function ($item) {
                return strtolower($item);
            });

        $columns = collect(['name' => 'string']);

        $query = $this->model::query();

        $search->each(function ($item) use ($columns, $query) {
            $columns->each(function ($type, $column) use ($query, $item) {
                if ($type === 'string') {
                    $query->orWhere(
                        DB::raw("lower({$column})"),
                        'like',
                        '%' . $item . '%'
                    );
                } else {
                    if ($this->isDate($item)) {
                        $query->orWhere($column, '=', $item);
                    }
                }
            });
        });

        return $this->makeResultForSelect($query->orderBy('name')->get());
    }

    public function toArrayWithColumnKey($elements, $columnName)
    {
        $returnArray = [];

        foreach ($elements as $element) {
            $returnArray[$element->$columnName] = $element;
        }

        return $returnArray;
    }

    /**
     * @param $item
     *
     * @return string|void
     */
    protected function toDate($item)
    {
        try {
            $item = Carbon::createFromFormat('d/m/Y', $item)->format('Y-m-d');
        } catch (\Exception $exception) {
            return;
        }

        return $item;
    }

    public function randomElement()
    {
        return $this->model::inRandomOrder()->first();
    }
}
