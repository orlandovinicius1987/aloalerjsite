<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

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
        'email',
    ];

    protected $appends = ['created_at_formatted', 'updated_at_formatted'];

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

    public function getCreatedAtFormattedAttribute()
    {
        return $this->formatDate($this->created_at);
    }

    public function formatDate($date)
    {
        if (!$date) {
            return '';
        }

        Date::setLocale('pt_BR');

        return Date::parse($date)->format($this->getFormattedDateFormat());
    }

    public function getFormattedDateFormat()
    {
        return 'j F Y - H\hi';
    }

    public function getUpdatedAtFormattedAttribute()
    {
        return $this->created_at == $this->updated_at ? '' : $this->formatDate($this->updated_at);
    }
}
