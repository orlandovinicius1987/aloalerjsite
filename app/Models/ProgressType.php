<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Data\Traits\Activable;

class ProgressType extends Model
{
    use Activable;
    /**
     * @var array
     */
    protected $fillable = ['name', 'is_active'];
}
