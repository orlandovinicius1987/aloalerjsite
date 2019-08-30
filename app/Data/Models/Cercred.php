<?php
namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Cercred extends Model
{
    protected $connection = 'cercred';

    protected $guarded = [];

    public $timestamps = false;

    public $incrementing = false;
}
