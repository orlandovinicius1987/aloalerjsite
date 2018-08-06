<?php

namespace App\Data\Models;

class AreaModel extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'areas';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
