<?php

namespace Tests\Browser\Pages;

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
        return factory(User::class, $type)->create();
    }
}
