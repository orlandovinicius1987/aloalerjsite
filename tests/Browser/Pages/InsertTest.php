<?php

namespace Tests\Browser\Pages;

use App\Data\Models\Committee;
use Laravel\Dusk\Browser;

use App\Notifications\ProgressCreated;
use App\Notifications\RecordCreated;
use Illuminate\Support\Facades\Notification;

use App\Data\Models\User;
use App\Data\Models\Person;
use App\Data\Models\Record;
use App\Data\Models\Progress;
use App\Data\Models\PersonAddress;
use App\Data\Models\PersonContact;

use App\Services\Phone;

use App\Data\Repositories\People as PeopleRepository;
use App\Data\Repositories\ContactTypes as ContactTypesRepository;
use App\Data\Repositories\Records as RecordsRepository;

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Messages\MailMessage;

class InsertTest extends Base
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

    public function testInsertProgress()
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
                    ->click('#saveButton')
                    ->waitForText('Anote o número do novo Protocolo');

                $protocol = $browser
                    ->element('#protocol-number')
                    ->getAttribute('innerHTML');

                $browser->clickLink($protocol);

                $browser
                    ->waitForText('PROTOCOLO EM ANDAMENTO')
                    ->click('#button-novo-andamento');

                $record_id = $browser
                    ->element('#record_id')
                    ->getAttribute('value');

                $progress = factory(Progress::class, 'CreateDusk')->raw();
                $progress['create_url'] = str_replace(
                    \URL::to('/'),
                    '',
                    route('progresses.create', [
                        'record_id' => $record_id,
                    ])
                );
                $progress = (object) $progress;

                $browser
                    ->select('#record_type_id', $progress->record_type_id)
                    ->select('#area_id', $progress->area_id)
                    ->select('#origin_id', $progress->origin_id)
                    ->select('#progress_type_id', $progress->progress_type_id)
                    ->type('#original', $record->original)
                    ->click('#saveButton')
                    ->waitForText('Gravado com sucesso');
                $browser->assertSee('Gravado com sucesso');
            });
        } catch (\Exception $exception) {
            throw $exception;
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }

    public function testInsertCommittee()
    {
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

        $committee = factory(Committee::class, 'dusk')->raw();

        $committee = (object) $committee;

        $faker = app('Faker');

        try {
            $this->browse(function (Browser $browser) use (
                $user,
                $faker,
                $person,
                $committee
            ) {
                $browser
                    ->loginAs($user->id)
                    ->screenshot('01')
                    ->visit('/callcenter/committees')
                    ->screenshot('02')
                    ->click('#buttonNovaComissao')
                    ->screenshot('03')
                    ->type('#name', $committee->name)
                    ->type('#short_name', $committee->short_name)
                    ->type('#phone', $committee->phone)
                    ->type('#office_phone', $committee->office_phone)
                    ->type('#email', $committee->email)
                    ->type('#president', $committee->president)
                    ->type('#vice_president', $committee->vicePresident)
                    ->type('#office_address', $committee->office_address)
                    ->type('#bio', $committee->bio)
                    ->click('#save_button')
                    ->waitForText('Comissão cadastrada com sucesso.');
                $browser->assertSee('Comissão cadastrada com sucesso.');
            });
        } catch (\Exception $exception) {
            throw $exception;
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }
}
