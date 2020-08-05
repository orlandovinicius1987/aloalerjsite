<?php
namespace App\Data\Models;

use App\Data\Traits\Activable;

class Area extends BaseModel
{
    use Activable;

    /**
     * @var array
     */
    protected $fillable = ['name', 'is_active'];
}
