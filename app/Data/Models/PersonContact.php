<?php
namespace App\Data\Models;

class PersonContact extends BaseModel
{
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
    ];

    public function contactType()
    {
        return $this->belongsTo(ContactType::class);
    }
}
