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
        'cpf_cnpj',
        'name',
        'identification',
        'is_anonymous',
        'origins_id',
        'created_by_id',
    ];
}
