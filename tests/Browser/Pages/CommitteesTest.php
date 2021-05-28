<?php

namespace Tests\Browser\Pages;

use App\Data\Repositories\People as PeopleRepository;
use App\Models\Committee;
use App\Models\Person;
use App\Models\User;
use App\Models\UserType;
use Laravel\Dusk\Browser;

class CommitteesTest extends Base
{
    public function testTableCommittees()
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

    public function testInsertCommittee()
    {
        $contactTypesArrayIsMobile['mobile'] = true;
        $contactTypesArrayIsMobile['whatsapp'] = true;
        $contactTypesArrayIsMobile['phone'] = false;

        $person = Person::factory()->make();


        $person = app(PeopleRepository::class)->randomElement();
        $personShowUrl = str_replace(
            \URL::to('/'),
            '',
            route('people.show', [
                'person_id' => $person->id
            ])
        );


        $committee = Committee::factory()->make();


        try {
            $this->browse(function (Browser $browser) use ($person, $committee) {

                $browser
                    ->loginAs($this->user())->screenshot('login');

                $browser->visit('/callcenter')
                    ->waitForText('Pesquisar');
                $browser
                    ->visit('/callcenter/committees')
                    ->screenshot('01');
                $browser->screenshot('02')
                    ->click('#buttonNovaComissao')
                    ->screenshot('03')
                    ->type('#name', $committee->name)
                    ->type('#slug', $committee->short_name)
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
