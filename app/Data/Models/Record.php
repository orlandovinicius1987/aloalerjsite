<?php
namespace App\Data\Models;

use App\Notifications\RecordCreated;
use App\Data\Scopes\Record as RecordScope;

class Record extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = [
        'protocol',
        'committee_id',
        'person_id',
        'record_type_id',
        'area_id',
        'objeto_id',
        'historico_id',
        'historico_id_finalizador',
        'person_first_record',
        'first',
        'answer_address_id',
        'send_answer_by_email',
        'resolved_at',
        'resolved_by_id',
        'record_action_id',
    ];

    protected $with = ['committee'];

    public function progresses()
    {
        return $this->hasMany(Progress::class);
    }

    public function committee()
    {
        return $this->belongsTo(Committee::class);
    }

    public function recordType()
    {
        return $this->belongsTo(RecordType::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function getProtocolAttribute($protocol)
    {
        if (strlen($protocol) == 28 && is_numeric($protocol)) {
            $protocol = $this->mask(
                '####.####.####.####.####.####.####',
                $protocol
            );
        } elseif (strlen($protocol) == 12 && is_numeric($protocol)) {
            $protocol = $this->mask(
                '####.####.####',
                $protocol
            );
        }

        return $protocol;
    }

    public function mask($mask, $str)
    {
        $str = str_replace(" ", "", $str);

        for ($i = 0; $i < strlen($str); $i++) {
            $mask[strpos($mask, "#")] = $str[$i];
        }

        return $mask;
    }

    public function getNotifiables()
    {
        return $this->person->emails;
    }

    public function sendNotifications()
    {
        return $this->sendNotificationsForClass(RecordCreated::class);
    }

    public function reopen()
    {
        $this->resolved_at = null;

        $this->resolved_by_id = null;

        $this->save();

        return $this;
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new RecordScope());
    }
}
