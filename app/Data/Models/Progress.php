<?php
namespace App\Data\Models;

use App\Data\Presenters\Progress as ProgressPresenter;

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
        'area_id',
        'created_at',
        'updated_at',
        'original_history_id',
    ];

    protected $presenters = ['link', 'finalize'];

    public function getPresenterClass()
    {
        return ProgressPresenter::class;
    }

    public function record()
    {
        return $this->belongsTo(Record::class);
    }

    public function progressType()
    {
        return $this->belongsTo(ProgressType::class);
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
