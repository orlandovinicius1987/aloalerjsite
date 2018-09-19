<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

use App\Data\Models\User;
use App\Data\Models\Person;
use App\Data\Models\Record;
use App\Data\Models\PersonAddress;
use App\Data\Models\PersonContact;

use App\Data\Repositories\People as PeopleRepository;
use App\Data\Repositories\ContactTypes as ContactTypesRepository;

use Faker\Generator as Faker;

class InsertTest extends DuskTestCase
{
    public function testInsertData()
    {
        $faker = app('Faker');

        $user = factory(User::class, 'Operador')->create();

        factory(Person::class)->create();

        $person = $faker->randomElement(
            app(PeopleRepository::class)
                ->all()
                ->toArray()
        );
        $person['show_url'] = str_replace(
            \URL::to('/'),
            '',
            route('people.show', [
                'person_id' => $person['id'],
            ])
        );
        $person = (object) $person;

        $record = factory(Record::class, 'Workflow')->raw();
        $record['create_url'] = str_replace(
            \URL::to('/'),
            '',
            route('records.create', [
                'person_id' => $person->id,
            ])
        );
        $record = (object) $record;

        $address = factory(PersonAddress::class, 'Workflow')->raw();
        $address['create_url'] = str_replace(
            \URL::to('/'),
            '',
            route('people_addresses.create', [
                'person_id' => $person->id,
            ])
        );
        $address = (object) $address;

        $contactsArray = factory(PersonContact::class, 'Workflow')->raw();

        $faker = app('Faker');

        try {
            $this->browse(function (Browser $browser) use (
                $user,
                $faker,
                $person,
                $record,
                $address,
                $contactsArray
            ) {
                $browser
                    ->loginAs($user->id)
                    ->visit('/callcenter/')
                    ->type('#search', $person->name)
                    ->waitForText($person->name)
                    ->clickLink($person->name)
                    ->click('#buttonNovoProtocolo')
                    ->assertPathIs($record->create_url)
                    ->select('#origin_id', $record->origin_id)
                    ->select('#committee_id', $record->committee_id)
                    ->select('#record_type_id', $record->record_type_id)
                    ->select('#progress_type_id', $record->progress_type_id)
                    ->select('#area_id', $record->area_id)
                    ->type('#original', $record->original)
                    ->click('#saveButton')
                    ->screenshot('oi')
                    ->waitForText('Gravado com sucesso')
                    ->click('#buttonNovoEndereco')
                    ->type('#zipcode', $address->zipcode)
                    ->type('#number', $address->number)
                    ->waitUntil(
                        'document.getElementById(\'street\').value == "' .
                            $address->address .
                            '"'
                    )
                    ->click('#saveButton')
                    ->waitForText('Gravado com sucesso');
                foreach ($contactsArray as $key => $contact) {
                    $contactType = app(
                        ContactTypesRepository::class
                    )->findByColumn('code', $key);
                    $browser
                        ->click('#buttonNovoContato')
                        ->waitForText('Selecione o tipo de contato')
                        ->waitUntil(
                            'document.getElementById(\'contact_type_id\').options.length > 1'
                        )
                        ->select('#contact_type_id', $contactType->id)
                        ->type('#contact', $contact)
                        ->click('#saveContactButton')
                        ->assertSee($contact);
                }
            });
        } catch (\Exception $exception) {
            throw $exception;
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }
}
