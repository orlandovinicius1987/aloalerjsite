<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

use App\Data\Models\User;
use App\Data\Models\Person;
use App\Data\Models\Record;
use App\Data\Models\PersonAddress;
use App\Data\Models\PersonContact;

class WorkflowTest extends DuskTestCase
{
    public function testWorkFlow()
    {
        $user = factory(User::class, 'Operador')->create();
        $person = factory(Person::class)->raw();

        $person = (object) array_merge($person, [
            'cpf_cnpj_com_pontos' => preg_replace(
                "/(\d\d\d)(\d\d\d)(\d\d\d)(\d\d)/",
                "$1.$2.$3-$4",
                $person['cpf_cnpj']
            ),
        ]);
        $record = (object) factory(Record::class, 'Workflow')->raw();
        $address = (object) factory(PersonAddress::class, 'Workflow')->raw();
        $contacts = (object) factory(PersonContact::class, 'Workflow')->raw();

        $faker = app('Faker');

        try {
            $this->browse(function (Browser $browser) use (
                $user,
                $faker,
                $person,
                $record,
                $address,
                $contacts
            ) {
                $browser
                    ->loginAs($user->id)
                    ->visit('/callcenter/')
                    ->type('#search', $person->cpf_cnpj)
                    ->waitForText('Cadastrar novo')
                    ->click('@cadastrarNovoCidadaoButton')
                    ->type('#identification', $person->identification);

                foreach (str_split($person->cpf_cnpj_com_pontos) as $char) {
                    $browser->keys('#cpf_cnpj', $char)->pause(20);
                }

                $browser
                    ->type('#name', $person->name)
                    ->click('#saveButton')
                    ->waitForText('Novo Protocolo')
                    ->assertSee('Usuário cadastrado com sucesso')
                    ->select('#origin_id', $record->origin_id)
                    ->select('#committee_id', $record->committee_id)
                    ->select('#record_type_id', $record->record_type_id)
                    ->select('#progress_type_id', $record->progress_type_id)
                    ->select('#area_id', $record->area_id)
                    ->type('#original', $record->original)
                    ->click('#saveButton')

                    ->waitForText('Endereços');
                $browser
                    ->type('#zipcode', $address->zipcode)
                    ->type('#number', $address->number)
                    ->waitUntil(
                        'document.getElementById(\'street\').value == "' .
                            $address->address .
                            '"'
                    )
                    ->click('#saveButton')
                    ->waitForText('Contatos')
                    ->type('#mobile', $contacts->mobile)
                    ->type('#whatsapp', $contacts->whatsapp)
                    ->type('#email', $contacts->email)
                    ->type('#phone', $contacts->phone)
                    ->click('#saveButton')
                    ->waitForText('Protocolo criado com sucesso')
                    ->waitUntil(
                        'document.getElementById(\'navbarDropdown\').text.includes(\'' .
                            $user->username .
                            '\')'
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
