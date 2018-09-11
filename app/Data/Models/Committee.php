<?php
namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'slug',
        'name',
        'link_caption',
        'short_name',
        'phone',
        'bio',
        'president',
        'vice_president',
        'office_phone',
        'office_address',
        'public',
        'email',
    ];
}
