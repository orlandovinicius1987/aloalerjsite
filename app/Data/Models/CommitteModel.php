<?php
namespace App\Data\Models;

class CommitteModel extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'committees';

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
