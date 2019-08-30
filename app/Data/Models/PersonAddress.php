<?php
namespace App\Data\Models;

use App\Data\Presenters\PersonContact as PersonAddressPresenter;

class PersonAddress extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = [
        'person_id',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighbourhood',
        'city',
        'state',
        'from',
        'is_mailable',
        'validated_at',
        'validated_by_id',
        'address_id',
        'active',
    ];

    protected $presenters = [
        'active_string',
        'created_at_formatted',
        'updated_at_formatted',
    ];

    public function getPresenterClass()
    {
        return PersonAddressPresenter::class;
    }
}
