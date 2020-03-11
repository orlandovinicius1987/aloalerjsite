<?php

namespace App\Data\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Record extends Scope
{
    public function apply(Builder $builder, Model $model)
    {
        //Se o usuário é de comissão
        if (is_committee_user()) {
            $builder->whereIn('committee_id', get_user_committee_ids());
        }
    }
}
