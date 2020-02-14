<?php
namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class CommitteeService extends Model
{
    /**
     * @var array
     */

    protected $fillable = [
        'short_name',
        'link_caption',
        'bio',
    ];

    public function committee()
    {
        return $this->belongsTo(Committee::class);
    }

    public function scopePermittedCommittees($query)
    {
        $committees = \Auth::user()->committees;

        $idsArray = [];
        foreach ($committees as $committee) {
            $idsArray[] = $committee->id;
        }

        return $query->whereIn('id', $idsArray);
    }
}
