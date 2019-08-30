<?php

namespace Tests\Browser\Pages;

use App\Data\Models\User;
use Laravel\Dusk\Browser;

class HomeTest extends Base
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testHome()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/callcenter/')->assertSee('Entrar');
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
                ->waitUntil(
                    'document.getElementById(\'navbarDropdown\').text.includes(\'' .
                        $user->username .
                        '\')'
                )
                ->assertPresent('#navbarDropdown');
        });
    }
}
