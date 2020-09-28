<?php
namespace App\Data\Models;

use App\Notifications\ProgressCreated;
use Illuminate\Notifications\Notifiable;
use App\Data\Presenters\Progress as ProgressPresenter;
use App\Data\Models\AttachedFile as AttachedFileModel;

class Progress extends BaseModel
{
    use Notifiable;

    protected $controlCreatedBy = true;
    protected $controlCreatedByCommittee = true;

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
        'created_by_committee_id'
    ];

    protected $presenters = ['link', 'finalize'];

    protected $with = ['creator'];

    public function getPresenterClass()
    {
        return ProgressPresenter::class;
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by_id');
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
        return $this->hasMany(AttachedFileModel::class);
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
        return $this->record->send_answer_by_email
            ? $this->record->person->emails
            : collect([]);
    }

    public function originCommittee()
    {
        return $this->belongsTo(Committee::class, 'created_by_committee_id');
    }
}
