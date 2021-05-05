<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable implements AuditableContract
{
    use Notifiable, AuditableTrait, HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'last_login_at', 'user_type_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function userType()
    {
        return $this->belongsTo(UserType::class);
    }
    public function committees()
    {
        return $this->belongsToMany(Committee::class, 'user_committees');
    }

    /**
     * Add webhook url for slack.
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    public function routeNotificationForSlack()
    {
        return config('services.slack.webhook_url');
    }

    public function originCommittee()
    {
        if ($this->userType->name == 'Comissao') {
            return $this->committees()->first();
        } else {
            return Committee::where('slug', 'alo-alerj')->first();
        }
    }

    public function getIsAdministratorAttribute()
    {
        return $this->userType->name == 'Administrador';
    }
}
