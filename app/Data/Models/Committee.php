<?php
namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    /**
     * @var array
     */

    protected $fillable = [
        'name',
        'slug',
        'short_name',
        'link_caption',
        'phone',
        'bio',
        'president',
        'vice_president',
        'office_phone',
        'office_address',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_committees');
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
