<?php
/**
 * Created by PhpStorm.
 * User: afdsilva
 * Date: 31/01/2018
 * Time: 15:08.
 */

namespace App\Data\Scope;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class Record implements Scope
{
    /**
     * @param Builder $builder
     * @param Model   $model
     */
    public function apply(Builder $builder, Model $model)
    {
        $committees = \Auth::user()->committees;
        if (!is_null($committees)) {
            foreach ($committees as $committee) {
                $builder->orWhere('committee_id', '=', $committee->id);
            }
        }
    }
}
