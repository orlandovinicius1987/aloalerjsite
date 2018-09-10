<?php
namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'short_name',
        'link_caption',
        'phone',
        'bio',
        'president',
        'vice_president',
        'office_phone',
        'office_address',
    ];
}
