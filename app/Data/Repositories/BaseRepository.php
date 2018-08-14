<?php
namespace App\Data\Repositories;

use Illuminate\Http\Request;

abstract class BaseRepository
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
     * @param $user_id
     *
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model::where('id', $id)->first();
    }

    /**
     * @param $collumn
     * @param $value
     *
     * @return mixed
     */
    public function findByColumn($collumn, $value)
    {
        return $this->model::where($collumn, $value)->first();
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

    /**
     * @param $field
     * @return mixed
     */
    public function allOrderBy($field)
    {
        return ($this->model::orderBy($field))->get();
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
}
