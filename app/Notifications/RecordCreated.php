<?php

namespace App\Notifications;

use App\Data\Models\Record;
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
        return (
            'Seu protocolo foi criado no Alô Alerj, por favor guarde o número dele: ' .
            $this->record->protocol
        );
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
        $this->record->logEmailWasSent();

        $message = (new MailMessage())
            ->subject('Novo Protocolo no Alô Alerj: ' . $this->record->protocol)
            ->greeting('Olá!')
            ->line($this->getMessage());

        $message->action(
            'Clique para ver detalhes do protocolo',
            route('records.show-public', $this->record->protocol)
        );

        return $message;
    }
}
