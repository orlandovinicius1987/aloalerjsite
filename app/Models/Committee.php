<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    /**
     * @var array
     */

    protected $fillable = [
        'name',
        'slug',
        'phone',
        'bio',
        'president',
        'vice_president',
        'office_phone',
        'office_address',
        'email'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_committees');
    }

    public function committeeServices()
    {
        return $this->hasMany(CommitteeService::class);
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
