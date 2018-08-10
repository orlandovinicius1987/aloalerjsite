<?php

namespace App\Services;

use Mail;

class Mailer
{
    /**
     * @param $input
     */
    private function dispatch($view, $input, $to, $subject, $bcc = null)
    {
        $to = $this->toArray($to);

        $bcc = $this->toArray($bcc);

        Mail::send($view, ['data' => $input], function ($m) use (
            $input,
            $to,
            $bcc,
            $subject
        ) {
            $m->from(env('MAIL_FROM_EMAIL'), env('MAIL_FROM_NAME'));

            if ($to) {
                $m->to($to);
            }

            if ($bcc) {
                $m->bcc($bcc);
            }

            if ($subject) {
                $m->subject($subject);
            }
        });
    }

    public function send($request)
    {
        $input = $request->all();

        $adminEmails = env('MAIL_ADMINS');

        $this->dispatch(
            'emails.contact',
            $input,
            env('MAIL_CONTACT_EMAIL'),
            'Mensagem de ' . $input['name'],
            $adminEmails
        );

        $this->dispatch(
            'emails.contact',
            $input,
            $input['email'],
            'Sua mensagem para o Alô Alerj'
        );
    }

    /**
     * @param $bcc
     * @return mixed
     */
    private function toArray($bcc)
    {
        if ($bcc && !is_array($bcc)) {
            $bcc = str_replace(',', ';', $bcc);

            $bcc = explode(';', $bcc);

            return $bcc;
        }

        return $bcc;
    }
}
