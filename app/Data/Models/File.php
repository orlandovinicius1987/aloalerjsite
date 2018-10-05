<?php
namespace App\Data\Models;

use Illuminate\Notifications\Notifiable;
use App\Data\Models\AttachedFile as ProgressFileModel;
use App\Data\Presenters\File as FilePresenter;

class File extends BaseModel
{
    use Notifiable;

    protected $presenters = ['download_link', 'icon'];

    public function getPresenterClass()
    {
        return FilePresenter::class;
    }

    /**
     * @var array
     */
    protected $fillable = ['url', 'sha1_hash', 'extension'];

    public function progressFile()
    {
        return $this->belongsTo(ProgressFileModel::class);
    }
}
