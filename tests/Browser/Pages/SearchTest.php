<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

use App\Models\User;
use App\Models\Person;
use App\Models\Record;
use App\Models\PersonAddress;
use App\Models\PersonContact;

use App\Data\Repositories\People as PeopleRepository;
use App\Data\Repositories\ContactTypes as ContactTypesRepository;

use Faker\Generator as Faker;

class SearchTest extends Base
{
    public function testSearchPerson()
    {
        //Busca por nome
        //Busca por cpf
        //Erro na busca - nada encontrado
        //Erro na busca - mais de 20 registros

        $faker = app('Faker');

        $user = factory(User::class, 'Operador')->create();

        $person1 = factory(Person::class)->create();
        $person2 = factory(Person::class)->create();

        for ($i = 0; $i < 30; $i++) {
            $persons[] = factory(Person::class, 'massInsert')->create();
        }

        try {
            $this->browse(function (Browser $browser) use ($user, $faker, $persons, $person1, $person2) {
                $browser
                    ->loginAs($user->id)
                    ->visit('/callcenter/')

                    ->type('#search', $person1->cpf_cnpj)
                    ->waitForText($person1->name)

                    ->type('#search', $person2->name)
                    ->waitForText($person2->name)

                    ->type('#search', $persons[0]->name)
                    ->waitForText('Busca resultou em mais de 20 registros')

                    ->type('#search', 'AEHER89W4RJT89Q3JGSOIERGJWE9804TJERIOGSNE9PT8H3Q4TOIJQ4958W34H5OIWQ4TJESA98HQ2')
                    ->waitForText('Nenhum resultado encontrado')
                    ->waitUntil(
                        'document.getElementById(\'navbarDropdown\').text.includes(\'' . $user->username . '\')'
                    )
                    ->assertPresent('#navbarDropdown');
            });
        } catch (\Exception $exception) {
            throw $exception;
        } catch (\Throwable $exception) {
            throw $exception;
        }

        foreach ($persons as $person) {
            $person->delete();
        }
    }

    public function testSearchRecord()
    {
        //Busca protocolo
        //Erro na busca - nada encontrado

        $faker = app('Faker');

        $user = factory(User::class, 'Operador')->create();

        $record = factory(Record::class)->create();

        try {
            $this->browse(function (Browser $browser) use ($user, $faker, $record) {
                $browser
                    ->loginAs($user->id)
                    ->visit('/callcenter/')
                    ->type('#search', $record->protocol)
                    ->waitForText($record->person->name)
                    ->type('#search', 'AEHER89W4RJT89Q3JGSOIERGJWE9804TJERIOGSNE9PT8H3Q4TOIJQ4958W34H5OIWQ4TJESA98HQ2')
                    ->waitForText('Nenhum resultado encontrado')
                    ->waitUntil(
                        'document.getElementById(\'navbarDropdown\').text.includes(\'' . $user->username . '\')'
                    )
                    ->assertPresent('#navbarDropdown');
            });
        } catch (\Exception $exception) {
            throw $exception;
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }
}
