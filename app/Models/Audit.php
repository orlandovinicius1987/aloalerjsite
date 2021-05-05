<?php

namespace App\Models;

use Carbon\Carbon;

class Audit extends BaseModel
{
    protected $dates = ['created_at'];

    protected $appends = ['formatted_created_at'];

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at ? $this->created_at->format('d/m/Y H:i:s') : null;
    }
}
