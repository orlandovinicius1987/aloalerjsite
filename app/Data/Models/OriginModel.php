<?php

namespace App\Data\Models;

class OriginModel extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'origins';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
