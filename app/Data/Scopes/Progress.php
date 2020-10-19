<?php

namespace App\Data\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Progress extends Scope
{
    public function apply(Builder $builder, Model $model)
    {

        //Se não estiver logado
        if (is_null(auth()->user())) {
            $builder->where('is_private', '=','0');
        }
    }
}
