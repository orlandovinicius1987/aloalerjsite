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
                $cont = 1;
                $browser
                    ->loginAs($user->id)
                    ->visit('/callcenter/')
                    ->screenshot($cont++)
                    ->type('#nameSearchInput', $person->name)
                    ->screenshot($cont++)
                    ->waitForText($person->name)
                    ->screenshot($cont++)
                    ->clickLink($person->name)
                    ->click('#buttonNovoProtocolo')
                    ->screenshot($cont++)
                    ->assertPathIs($record->create_url)
                    ->select('#origin_id', $record->origin_id)
                    ->select('#committee_id', $record->committee_id)
                    ->select('#record_type_id', $record->record_type_id)
                    ->select('#progress_type_id', $record->progress_type_id)
                    ->select('#area_id', $record->area_id)
                    ->type('#original', $record->original)
                    ->screenshot($cont++)
                    ->click('#saveButton')
                    ->waitForText('Gravado com sucesso')
                    ->screenshot($cont++)
                    ->click('#buttonNovoEndereco')
                    ->screenshot($cont++)
                    ->type('#zipcode', $address->zipcode)
                    ->type('#number', $address->number)
                    ->waitUntil(
                        'document.getElementById(\'street\').value == "' .
                            $address->address .
                            '"'
                    )
                    ->screenshot($cont++)
                    ->click('#saveButton')
                    ->screenshot($cont++)
                    ->waitForText('Gravado com sucesso')
                    ->screenshot($cont++);

                foreach ($contactsArray as $key => $contact) {
                    $contactType = app(
                        ContactTypesRepository::class
                    )->findByColumn('code', $key);

                    $browser
                        ->click('#buttonNovoContato')
                        ->screenshot($cont++)
                        ->screenshot($cont++)
                        ->click('#saveButton')
                        ->screenshot($cont++);
                }

                //                $browser
                //                    ->waitForText('Gravado com sucesso')
                //                    ->type('#mobile', $contacts->mobile)
                //                    ->type('#whatsapp', $contacts->whatsapp)
                //                    ->type('#email', $contacts->email)
                //                    ->type('#phone', $contacts->phone)
                //                    ->click('#saveButton')
                //                    ->assertSee($user->username);
            });
        } catch (\Exception $exception) {
            throw $exception;
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }
}
