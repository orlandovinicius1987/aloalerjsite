<?php

namespace App\Data\Traits;

trait Activable
{
    /**
     * Scope a query to only include active data.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
