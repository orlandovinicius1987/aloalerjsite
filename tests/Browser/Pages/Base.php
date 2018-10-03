<?php

namespace Tests\Browser\Pages;

use Tests\DuskTestCase;
use App\Data\Models\User;
use Faker\Generator as Faker;

class Base extends DuskTestCase
{
    protected $faker;

    protected $user;

    public function __construct()
    {
        parent::__construct();

        $this->faker = new Faker();
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
