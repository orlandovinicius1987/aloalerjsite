<?php
namespace App\Models;

use App\Data\Traits\Activable;

class RecordType extends BaseModel
{
    use Activable;

    /**
     * @var array
     */
    protected $fillable = ['name', 'is_active'];
}
