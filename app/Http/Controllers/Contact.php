<?php
namespace App\Http\Controllers;

use App\Models\RecordType;
use App\Data\Repositories\Records;
use App\Http\Requests\Contact as ContactRequest;
use App\Services\Mailer;

class Contact extends Controller
{
    /**
     * @var Mailer
     */
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function index()
    {
        return view('contact.index')
            ->with('committeeServices', $this->getPublicCommitteeServices())
            ->with('recordTypes', RecordType::active()->pluck('name', 'id')); //Trocar isso. Colocar só os ativos
    }

    public function post(ContactRequest $request)
    {
        // $this->mailer->send($request);

        $record = app(Records::class)->absorbContactForm($request->all());

        return view('contact.mailsent')
            ->with('name', $request->get('name'))
            ->with('record', $record)
            ->with('committeeServices', $this->getPublicCommitteeServices());
    }

    public function pretend()
    {
        return view('contact.mailsent')->with('name', 'Fulano de Tal');
    }
}
