<?php
namespace App\Data\Models;

use App\Notifications\ProgressCreated;
use Illuminate\Notifications\Notifiable;
use App\Data\Presenters\Progress as ProgressPresenter;
use App\Data\Models\ProgressFile as ProgressFileModel;

class Progress extends BaseModel
{
    use Notifiable;

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

    public function progressFiles()
    {
        return $this->belongsToMany(ProgressFileModel::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class);
    }

    public function sendNotifications()
    {
        return $this->sendNotificationsForClass(ProgressCreated::class);
    }

    public function getNotifiables()
    {
        return $this->record->person->emails;
    }
}
