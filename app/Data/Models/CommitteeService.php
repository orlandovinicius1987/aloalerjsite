<?php
namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class CommitteeService extends Model
{
    /**
     * @var array
     */

    protected $fillable = [
        'committee_id',
        'short_name',
        'link_caption',
        'bio',
        'public',
    ];

      protected $with = ['committee'];

    public function committee()
    {
        return $this->belongsTo(Committee::class);
    }

}
