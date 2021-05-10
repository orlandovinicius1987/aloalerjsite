<?php

namespace App\Services;

use Mail;

class Scholarship
{
    public static $subjects = [
        '1' => '1° Grau - Primário Incompleto',
        '2' => '1° Grau - Primário Completo',
        '3' => '1° Grau - Ginasial Incompleto',
        '4' => '1° Grau - Ginasial Completo',
        '5' => '2° Grau - Colegial Incompleto',
        '6' => '2° Grau - Colegial Completo',
        '7' => '3° Grau - Superior Incompleto',
        '8' => '3° Grau - Superior Completo',
        '9' => 'Especialização',
        '10' => 'Mestrado',
        '11' => 'Doutorado'
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
