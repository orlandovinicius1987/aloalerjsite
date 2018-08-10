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
        'progress_action_id',
        'created_by_id',
        'original',
        'rectified',
        'rectified_at',
        'rectified_by_id',
        'history_fields',
        'created_at',
        'updated_at',
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
