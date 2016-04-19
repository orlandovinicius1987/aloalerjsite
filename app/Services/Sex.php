<?php

namespace App\Services;

use Mail;

class Sex
{
    public static $subjects = [
        'M' => 'Masculino',
        'F' => 'Feminino',
    ];

    public static function all()
    {
        return static::$subjects;
    }

    public static function find($id)
    {
        return static::$subjects[$id];
    }
}
