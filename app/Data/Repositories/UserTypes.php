<?php
namespace App\Data\Repositories;

use App\Data\Models\UserType;
use Illuminate\Support\Facades\Cache;

class UserTypes extends Base
{
    /**
     * @var string
     */
    protected $model = UserType::class;

    /**
     * @param $name
     *
     * @return mixed
     */
    public function findByName($name)
    {
        return Cache::remember(
            'UserTypes-findByName-' . $name,
            1000,
            function () use ($name) {
                return UserType::where('name', $name)->first();
            }
        );
    }
}
