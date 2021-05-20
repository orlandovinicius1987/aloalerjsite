<?php
namespace App\Models;

use App\Services\ConversionMimeIcon;
use Illuminate\Notifications\Notifiable;
use App\Models\AttachedFile as ProgressFileModel;
use App\Data\Presenters\File as FilePresenter;
use App\Http\Controllers\CallCenter\Files as FilesController;
use Mimey\MimeTypes;

class File extends BaseModel
{
    use Notifiable;

    protected $appends = ['public_url', 'download_link', 'icon'];

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

    public function getDownloadLinkAttribute()
    {
        $id = $this->id;

        return route('files.download', [
            'id' => $id,
        ]);
    }

    public function getIconAttribute()
    {
        $extension = $this->extension;
        $mimes = new MimeTypes();

        return ConversionMimeIcon::mimeToClass($mimes->getMimeType($extension));
    }
}
