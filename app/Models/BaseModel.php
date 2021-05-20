<?php
namespace App\Models;

use Illuminate\Support\Facades\Cache;
use App\Data\Presenters\Base;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use McCool\LaravelAutoPresenter\HasPresenter;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

abstract class BaseModel extends Model implements AuditableContract
{
    use AuditableTrait;

    protected $controlCreatedBy = false;
    protected $controlUpdatedBy = false;
    protected $controlCreatedByCommittee = false;

    /**
     * @var bool
     */
    protected $revisionEnabled = true;

    /**
     * @var bool
     */
    protected $revisionCreationsEnabled = true;

    /**
     * @var array
     */
    protected $dataTypes = [];

    /**
     * @var array
     */
    protected $appends = ['created_at_formatted', 'updated_at_formatted'];

    /**
     * Cache keys to be flushed when a model is saved.
     *
     * @var array
     */
    protected $flushKeys = [];

    private function flushKeys()
    {
        coollect($this->flushKeys)->each(function ($key) {
            Cache::forget($key);
        });
    }

    /**
     * @param $column
     *
     * @return mixed
     */
    public static function getDataTypeOf($column)
    {
        $model = new static();

        return collect($model->dataTypes)->get($column);
    }

    /**
     * @return string
     */
    public function getPresenterClass()
    {
        return Base::class;
    }

    public function save(array $options = [])
    {
        $this->flushKeys();

        Cache::tags(['search'])->flush();

        return parent::save($options);
    }

    public function sendNotifications()
    {
        return $this;
    }

    public function logEmailWasSent()
    {
        $this->email_sent_at = now();

        $this->save();
    }

    public function sendNotificationsForClass(string $class)
    {
        if (($notifiables = $this->getNotifiables())->count() == 0) {
            return false;
        }

        $notifiables->each(function ($notifiable) use ($class) {
            $notifiable->notify(new $class($this));
        });
        return $this;
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            if ($model->controlUpdatedBy) {
                $model->updated_by_id = ($user = auth()->user()) ? $user->id : 1;
            }
        });

        static::creating(function ($model) {
            if ($model->controlCreatedBy) {
                $model->created_by_id = ($user = auth()->user()) ? $user->id : 1;
            }

            if ($model->controlCreatedByCommittee) {
                $model->created_by_committee_id = ($user = auth()->user())
                    ? $user->originCommittee()->id
                    : null;
            }
        });
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
