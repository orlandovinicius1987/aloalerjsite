<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use App\Models\AttachedFile as ProgressFileModel;
use App\Data\Presenters\File as FilePresenter;
use App\Http\Controllers\CallCenter\Files as FilesController;

class File extends BaseModel
{
    use Notifiable;

    protected $presenters = ['download_link', 'icon'];

    protected $appends = ['public_url'];

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

    public function getPublicUrlAttribute()
    {
        $path = app(FilesController::class)->path($this->sha1_hash, '');
        return '/files' . $path . $this->sha1_hash . '.' . $this->extension;
    }
}
