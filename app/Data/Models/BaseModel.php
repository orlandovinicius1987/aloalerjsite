<?php
namespace App\Data\Models;

use Illuminate\Support\Facades\Cache;
use App\Data\Presenters\Base;
use Illuminate\Database\Eloquent\Model;
use McCool\LaravelAutoPresenter\HasPresenter;

abstract class BaseModel extends Model implements HasPresenter
{
    /**
     * @var bool
     */
    protected $revisionEnabled = true;

    /**
     * @var bool
     */
    protected $revisionCreationsEnabled = true;

    /**
     * @var array
     */
    protected $dataTypes = [];

    /**
     * @var array
     */
    protected $presenters = [];

    /**
     * Cache keys to be flushed when a model is saved.
     *
     * @var array
     */
    protected $flushKeys = [];

    private function flushKeys()
    {
        coollect($this->flushKeys)->each(function ($key) {
            Cache::forget($key);
        });
    }

    /**
     * @param $column
     *
     * @return mixed
     */
    public static function getDataTypeOf($column)
    {
        $model = new static();

        return collect($model->dataTypes)->get($column);
    }

    /**
     * @return string
     */
    public function getPresenterClass()
    {
        return Base::class;
    }

    public function save(array $options = [])
    {
        $this->flushKeys();

        Cache::tags(['search'])->flush();

        return parent::save($options);
    }

    // Isso aqui está BUGADO. Não está retornando array em tudo quando se faz um ->toArray()
    //    /**
    //     * @return array
    //     */
    //    public function attributesToArray()
    //    {
    //        $attributes = parent::attributesToArray();
    //
    //        $decorated = AutoPresenter::decorate($this);
    //
    //        foreach ($this->presenters as $key) {
    //            $attributes[$key] = $decorated->{$key};
    //        }
    //
    //        return $attributes;
    //    }
}
