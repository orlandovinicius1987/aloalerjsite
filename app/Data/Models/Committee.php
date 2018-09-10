<?php
namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

use App\Data\Models\UserCommittee as UserCommittee;

class Committee extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'bio'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_committees');
    }

    public function scopePermittedCommittees($query)
    {
        $committees = \Auth::user()->committees();

        $idsArray = [];
        foreach ($committees as $committee) {
            $idsArray[] = $committee->id;
        }

        return $query->whereIn('id', $idsArray);
    }
}
