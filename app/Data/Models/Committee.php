<?php
namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'bio'];
}
