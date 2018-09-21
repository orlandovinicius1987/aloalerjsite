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
            $browser
                ->resize(1200, 800)
                ->visit('/callcenter/')
                ->assertSee('Entrar');
        });
    }

    public function testLogin()
    {
        $user = factory(User::class, 'Operador')->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->resize(1200, 800)
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
