<?php

namespace Tests\Browser;

use App\Notifications\ProgressCreated;
use App\Notifications\RecordCreated;
use Illuminate\Support\Facades\Notification;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

use App\Data\Models\User;
use App\Data\Models\Person;
use App\Data\Models\Record;
use App\Data\Models\PersonAddress;
use App\Data\Models\PersonContact;

use App\Services\Phone;

use App\Data\Repositories\People as PeopleRepository;
use App\Data\Repositories\ContactTypes as ContactTypesRepository;
use App\Data\Repositories\Records as RecordsRepository;

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Messages\MailMessage;

class InsertTest extends DuskTestCase
{
    public function testInsertData()
    {
        //        Notification::fake();
        $contactTypesArrayIsMobile['mobile'] = true;
        $contactTypesArrayIsMobile['whatsapp'] = true;
        $contactTypesArrayIsMobile['phone'] = false;

        $user = factory(User::class, 'Operador')->create();

        factory(Person::class)->create();

        $person = app(PeopleRepository::class)->randomElement();
        $personShowUrl = str_replace(
            \URL::to('/'),
            '',
            route('people.show', [
                'person_id' => $person->id,
            ])
        );

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
                $contactsArray,
                $personShowUrl,
                $contactTypesArrayIsMobile
            ) {
                $browser
                    ->loginAs($user->id)
                    ->visit('/callcenter/')
                    ->type('@search', $person->name)
                    ->waitForText($person->name)
                    ->clickLink($person->name)
                    ->click('#button-novo-protocolo')
                    ->select('#origin_id', $record->origin_id)
                    ->select('#committee_id', $record->committee_id)
                    ->select('#record_type_id', $record->record_type_id)
                    ->select('#progress_type_id', $record->progress_type_id)
                    ->select('#area_id', $record->area_id)
                    ->type('#original', $record->original)
                    ->click('#saveButton');

                //                if (!empty($person->emails)) {
                //                    Notification::assertSentTo(
                //                        $person->emails,
                //                        RecordCreated::class
                //                    );
                //                }

                $browser
                    ->waitForText('Anote o número do novo Protocolo')
                    ->visit($personShowUrl)
                    ->scrollTo('button-novo-endereco')
                    ->click('#button-novo-endereco')
                    ->type('#zipcode', $address->zipcode)
                    ->type('#number', $address->number)
                    ->waitUntil(
                        'document.getElementById(\'street\').value == "' .
                            $address->address .
                            '"'
                    )
                    ->click('#saveButton')
                    ->waitForText('Endereço cadastrado com sucesso');
                foreach ($contactsArray as $key => $contact) {
                    $contactType = app(
                        ContactTypesRepository::class
                    )->findByColumn('code', $key);
                    $browser
                        ->click('#button-novo-contato')
                        ->waitForText('Selecione o tipo de contato')
                        ->waitUntil(
                            'document.getElementById(\'contact_type_id\').options.length > 1'
                        )
                        ->select('#contact_type_id', $contactType->id)
                        ->type('#contact', $contact)
                        ->click('#saveContactButton');
                    if (isset($contactTypesArrayIsMobile[$contactType->code])) {
                        $contact = Phone::addPhoneMask(
                            $contact,
                            $contactTypesArrayIsMobile[$contactType->code]
                        );
                    }
                    $browser->assertSee($contact);
                }
            });
        } catch (\Exception $exception) {
            throw $exception;
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }
}
