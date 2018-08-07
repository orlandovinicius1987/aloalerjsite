<?php
namespace App\Data\Models;

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

    public function contacts()
    {
        return $this->belongsToMany(PersonContact::class);
    }

    public function addresses()
    {
        return $this->belongsToMany(PersonAddress::class);
    }
}
