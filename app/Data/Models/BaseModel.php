<?php

namespace App\Data\Models;

use App\Data\Presenters\BasePresenter;
use Illuminate\Database\Eloquent\Model;
use McCool\LaravelAutoPresenter\Facades\AutoPresenter;
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
        return BasePresenter::class;
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
