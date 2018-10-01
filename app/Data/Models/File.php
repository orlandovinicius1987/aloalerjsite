<?php
namespace App\Data\Models;

use Illuminate\Notifications\Notifiable;
use App\Data\Models\AttachedFile as ProgressFileModel;

class File extends BaseModel
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = ['url', 'sha1_hash'];

    public function progressFile()
    {
        return $this->belongsTo(ProgressFileModel::class);
    }
}
