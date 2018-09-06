<?php
namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

use App\Data\Scope\Committee as CommitteeScope;

class Committee extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'bio'];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CommitteeScope());
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_committees');
    }
}
