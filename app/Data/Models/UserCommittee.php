<?php
namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class UserCommittee extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'committee_id'];
}
