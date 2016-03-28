<?php

namespace App\Services;

use Mail;

class Mailer
{
    public function send($request)
    {
        $input = $request->all();

        Mail::send('emails.contact', ['request' => $input], function ($m) use ($input)
        {
            $m->from(env('MAIL_FROM_EMAIL'), env('MAIL_FROM_NAME'));

            $m->to(env('MAIL_FROM_EMAIL'), env('MAIL_FROM_NAME'))->subject('Mensagem de '.$input['name']);

            $m->to($input['email'], $input['name'])->subject('Sua mensagem para o Alô Alerj');
        });
    }
}
