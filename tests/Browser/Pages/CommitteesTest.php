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
                ->waitForText('Idoso')
                ->assertSee('Nome Resumido')
                ->type('#search', 'Defesa do Consumidor')
                ->waitUntil("document.getElementById('committeesTable').rows.length === 2")
                ->assertSee('0800 282-7060')
                ->assertDontSee('Idoso')
                ->type('#search', 'Esta comissao não existe')
                ->waitUntil("document.getElementById('committeesTable').rows.length === 1")
                ->type('#search', 'Idoso')
                ->waitForText('Idoso')
                ->assertSee('Adolescente e do Idoso');
        });
    }
}
