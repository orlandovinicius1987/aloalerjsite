<?php

namespace App\Services;

use Mail;

class Mailer
{
    /**
     * @param $input
     */
    private function dispatch($view, $input, $to, $name, $subject)
    {
        Mail::send($view, ['data' => $input], function ($m) use ($input, $to, $name, $subject)
        {
            $m->from(env('MAIL_FROM_EMAIL'), env('MAIL_FROM_NAME'));

            $m->to($to, $name)->subject($subject);
        });
    }

    public function send($request)
    {
        $input = $request->all();

        $this->dispatch('emails.contact', $input, env('MAIL_FROM_EMAIL'), env('MAIL_FROM_NAME'), 'Mensagem de ' . $input['name']);

        $this->dispatch('emails.contact', $input, $input['email'], $input['name'], 'Sua mensagem para o Alô Alerj');
    }
}
