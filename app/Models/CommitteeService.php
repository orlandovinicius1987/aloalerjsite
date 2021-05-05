<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommitteeService extends Model
{
    /**
     * @var array
     */

    protected $fillable = ['committee_id', 'short_name', 'link_caption', 'bio', 'public', 'phone', 'email'];

    protected $with = ['committee'];

    public function committee()
    {
        return $this->belongsTo(Committee::class);
    }
}
