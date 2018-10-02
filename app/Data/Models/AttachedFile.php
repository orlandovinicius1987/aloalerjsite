<?php
namespace App\Data\Models;

use Illuminate\Notifications\Notifiable;
use App\Data\Models\Progress as ProgressModel;
use App\Data\Models\File as FileModel;
use App\Data\Presenters\AttachedFile as AttachedFilePresenter;

class AttachedFile extends BaseModel
{
    use Notifiable;

    protected $presenters = ['download_link'];

    public function getPresenterClass()
    {
        return AttachedFilePresenter::class;
    }

    /**
     * @var array
     */
    protected $fillable = ['file_id', 'progress_id', 'description'];

    public function file()
    {
        return $this->belongsTo(FileModel::class);
    }

    public function progress()
    {
        return $this->belongsTo(ProgressModel::class);
    }
}
