<?php
namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    public function findBySlug($slug)
    {
        return Committee::where('slug', $slug)->first();
    }
}
