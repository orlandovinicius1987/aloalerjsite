<?php
namespace App\Data\Models;

class Progress extends BaseModel
{
    /**
     * @var array
     */
    protected $fillable = [
        'record_id',
        'progress_type_id',
        'created_by_id',
        'original',
        'rectified',
        'rectified_at',
        'rectified_by_id',
    ];

    public function record()
    {
        return $this->belongsTo(Record::class);
    }

    public function progressType()
    {
        return $this->belongsTo(ProgressType::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }
}
