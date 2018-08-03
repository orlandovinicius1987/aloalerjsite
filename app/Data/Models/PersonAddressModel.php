<?php

namespace App\Data\Models;

class PersonAddressModel extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'persons_addresses';

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
    ];
}
