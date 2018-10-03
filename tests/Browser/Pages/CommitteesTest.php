<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class CommitteesTest extends Base
{
    public function testTable()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->user())
                ->visit('/callcenter/')
                ->waitForText('Pesquisar')
                ->visit('/callcenter/committees')
                ->waitForText('Telefone Gabinete')
                ->assertSee('Nome Resumido')
                ->type('#search', 'Defesa do Consumidor')
                ->waitForText('0800 282-7060');
        });
    }
}
