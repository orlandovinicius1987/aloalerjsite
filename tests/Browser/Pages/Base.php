<?php

namespace Tests\Browser\Pages;

use App\Models\UserType;
use Tests\DuskTestCase;
use App\Models\User;
use Faker\Factory as Faker;

class Base extends DuskTestCase
{
    protected $faker;

    protected $user;

    public function __construct()
    {
        parent::__construct();

        $this->faker = Faker::create();
    }

    public function user($type = 'Operador')
    {
        if ($this->user) {
            return $this->user;
        }

        return $this->user = $this->newUser($type);
    }

    public function newUser($type = 'Operador')
    {
        $faker = app('Faker');
        return $faker->randomElement(User::
        where('user_type_id',UserType::where('name','=','Administrador')
            ->first()->id)
            ->get()->where('username','=','ovalenca'));
    }
}
