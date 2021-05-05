<?php

namespace App\Notifications;

use App\Models\Record;
use App\Data\Repositories\Records;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RecordCreated extends Notification implements ShouldQueue
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
        if (!$this->record->resolved_at) {
            return 'Seu protocolo recebeu atualizações no Alô Alerj, por favor guarde o número dele: ' .
                $this->record->protocol;
        } else {
            return 'Seu protocolo ' . $this->record->protocol . ' foi finalizado no Alô Alerj. ';
        }
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
        $subject = null;

        $this->record->logEmailWasSent();

        if (!$this->record->resolved_at) {
            $subject = 'Protocolo no Alô Alerj: ' . $this->record->protocol;
        } else {
            $subject = 'Finalização do protocolo ' . $this->record->protocol . ' no Alô Alerj';
        }
        $message = (new MailMessage())
            ->subject($subject)
            ->greeting('Olá!')
            ->line($this->getMessage());

        $message->action('Clique para acessar seu protocolo com sua chave de acesso', route('home'));

        return $message;
    }
}
