<?php

namespace App\Data\Models;

use Illuminate\Notifications\Notifiable;
use App\Data\Presenters\PersonContact as PersonContactPresenter;

class PersonContact extends BaseModel
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'person_id',
        'contact_type_id',
        'contact',
        'from',
        'status',
        'email_id',
        'validated_at',
        'validated_by_id',
        'provider_enrichment_id',
        'created_at',
        'active',
    ];

    protected $presenters = [
        'active_string',
        'created_at_formatted',
        'updated_at_formatted',
    ];

    public function getPresenterClass()
    {
        return PersonContactPresenter::class;
    }

    public function contactType()
    {
        return $this->belongsTo(ContactType::class);
    }

    public function routeNotificationForMail()
    {
        return $this->contact;
    }
}
