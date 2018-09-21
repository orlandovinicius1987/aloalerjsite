<?php
namespace App\Http\Controllers;

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
        return view('contact.index');
    }

    public function post(ContactRequest $request)
    {
        $this->mailer->send($request);

        app(Records::class)->absorbContactForm($request->all());

        return view('contact.mailsent')->with('name', $request->get('name'));
    }

    public function pretend()
    {
        return view('contact.mailsent')->with('name', 'Fulano de Tal');
    }
}
