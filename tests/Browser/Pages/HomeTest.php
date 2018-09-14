<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

use App\Data\Models\User;

class HomeTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testHome()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/callcenter/')->assertSee('Call Center');
        });
    }

    public function testLogin()
    {
        $user = factory(User::class, 'Operador')->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->visit('/callcenter/')
                ->type('#email', $user->username)
                ->type('#password', 'secret')
                ->click('#loginButton')
                ->assertSee($user->username);
        });
    }
}
