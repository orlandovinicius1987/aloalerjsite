<?php

namespace App\Data\Models;

class PersonAddress extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = [
        'person_id',
        'zipcode',
        'street',
        'complement',
        'neighbourhood',
        'city',
        'state',
        'from',
        'is_mailable',
        'validated_at',
        'validated_by_id',
        'address_id',
    ];
}
