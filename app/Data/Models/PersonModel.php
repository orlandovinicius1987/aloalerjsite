<?php
namespace App\Data\Models;

class PersonModel extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'persons';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
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
        return $this->belongsToMany(PersonContactModel::class);
    }

    public function addresses()
    {
        return $this->belongsToMany(PersonAddressModel::class);
    }
}
