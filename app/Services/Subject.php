<?php

namespace App\Services;

use Mail;

class Subject
{
    public static $subjects = [
        'A' => 'Ajuda',
        'P' => 'Pergunta',
        'S' => 'Sugestão',
        'E' => 'Elogio',
        'D' => 'Denúncia',
        'R' => 'Reclamação',
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
