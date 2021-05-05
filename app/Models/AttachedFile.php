<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use App\Models\Progress as ProgressModel;
use App\Models\File as FileModel;

class AttachedFile extends BaseModel
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = ['file_id', 'progress_id', 'description'];

    protected $with = ['file'];

    public function file()
    {
        return $this->belongsTo(FileModel::class);
    }

    public function progress()
    {
        return $this->belongsTo(ProgressModel::class);
    }
}
