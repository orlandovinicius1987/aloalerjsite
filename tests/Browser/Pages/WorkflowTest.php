<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

use App\Data\Models\User;
use App\Data\Models\Person;

class WorkflowTest extends DuskTestCase
{
    public function testWorkFlow()
    {
        $user = factory(User::class, 'Operador')->create();
        $person = factory(Person::class)->create();

        $faker = app('Faker');

        $this->browse(function (Browser $browser) use ($user, $faker, $person) {
            $cont = 1;
            $browser
                ->loginAs($user->id)
                ->visit('/callcenter/')
                ->screenshot($cont++)
                ->type('#cpfCnpjSearchInput', $person->cpf_cnpj)
                ->screenshot($cont++)
                ->waitForText('Cadastrar novo')
                ->screenshot($cont++)
                ->click('#cadastrarNovoCidadaoButton')
                ->screenshot($cont++)
                ->waitForText('DADOS PESSOAIS')
                ->type('#identification', $person->identification)
                ->type('#name', $person->name)
                ->screenshot($cont++)
                ->click('#saveButton')
                ->screenshot($cont++)
                ->screenshot($cont++)
                ->assertSee($user->username);
        });
    }
}
