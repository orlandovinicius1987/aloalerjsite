<?php
namespace App\Data\Models;

use App\Support\Constants;

class Person extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = [
        'cpf_cnpj',
        'name',
        'identification',
        'is_anonymous',
        'civil_status_id',
        'spouse_name',
        'ocupacao_principal_id',
        'scholarship_id',
        'income',
        'person_type_id',
        'created_by_id',
        'updated_by_id',
    ];

    protected $flushKeys = [Constants::CACHE_KEY_PEOPLE_SEARCH_BY_EVERYTHING];

    public function contacts()
    {
        return $this->hasMany(PersonContact::class);
    }

    public function addresses()
    {
        return $this->hasMany(PersonAddress::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
