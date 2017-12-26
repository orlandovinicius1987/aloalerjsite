<?php

namespace App\Services;

use Mail;

class Sex
{
    public static $sex_1 = [
        'Masculino' => 'Masculino',
        'Feminino' => 'Feminino',
    ];

    public static $sex_2 = [
        'Masculino' => 'Masculino',
        'Feminino' => 'Feminino',
        'Agênero' => 'Agênero',
        'Andrógino' => 'Andrógino',
        'Bigênero' => 'Bigênero',
        'Homem Cis' => 'Homem Cis',
        'Mulher Cis' => 'Mulher Cis',
        'Duplo-espírito' => 'Duplo-espírito',
        'Genderqueer' => 'Genderqueer',
        'Gênero em Dúvida' => 'Gênero em Dúvida',
        'Gênero Fluido' => 'Gênero Fluido',
        'Gênero Não-conformista' => 'Gênero Não-conformista',
        'Gênero Variante' => 'Gênero Variante',
        'Intersex' => 'Intersex',
        'Não-binário' => 'Não-binário',
        'Nenhum' => 'Nenhum',
        'Neutrois' => 'Neutrois',
        'Pangênero' => 'Pangênero',
        'Transgênero' => 'Transgênero',
        'Transexual' => 'Transexual',
        'Outro' => 'Outro',
    ];

    public static function all($kind = 1)
    {
        return $kind === 1
            ? static::$sex_1
            : static::$sex_2;
    }

    public static function find($id, $kind = 1)
    {
        $types = $kind === 1
            ? static::$sex_1
            : static::$sex_2;

        return $types[$id];
    }
}
