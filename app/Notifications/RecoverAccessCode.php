<?php

namespace App\Notifications;

use App\Data\Models\Record;
use App\Data\Repositories\Records;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RecoverAccessCode extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Record
     */
    protected $record;

    public function __construct(Record $record)
    {
        $this->record = $record;
    }

    /**
     * @return string
     */
    private function getMessage()
    {
        return ('Seu código de acesso é  ' . $this->record->access_code);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via()
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail()
    {
    
        $subject = 'Recuperação do código de acesso';
    
        $message = (new MailMessage())
            ->subject($subject)
            ->greeting('Olá!')
            ->line($this->getMessage());

        $message->action(
            'Clique para acessar seu protocolo com sua chave de acesso',
             route('home')
        );

        return $message;
    }
}
