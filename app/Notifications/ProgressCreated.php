<?php

namespace App\Notifications;

use App\Data\Models\Progress;
use App\Data\Repositories\Progresses;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ProgressCreated extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Progress
     */
    protected $progress;

    public function __construct(Progress $progress)
    {
        $this->progress = $progress;
    }

    /**
     * @return string
     */
    private function getMessage()
    {
        return (
            'Um ou mais andamentos foram atualizados ao protocolo ' .
            $this->progress->record->protocol
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
        $this->progress->logEmailWasSent();

        $message = (new MailMessage())
            ->subject(
                'O seu protocolo ' .
                    $this->progress->record->protocol .' foi atualizado'
            )
            ->greeting('Olá!')
            ->line($this->getMessage());

        $message->action(
            'Clique para ver detalhes do andamento',
            route('records.show-public', $this->progress->record->protocol)
        );

        return $message;
    }
}
