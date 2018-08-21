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
        'origin_id',
        'record_type_id',
        'area_id',
        'created_at',
        'updated_at'
    ];

    public function record()
    {
        return $this->belongsTo(Record::class);
    }

    public function progressType()
    {
        return $this->belongsTo(ProgressType::class);
    }

    public function recordType()
    {
        return $this->belongsTo(RecordType::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function origin()
    {
        return $this->belongsTo(Origin::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }
}
