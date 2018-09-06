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

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_committees');
    }
}
