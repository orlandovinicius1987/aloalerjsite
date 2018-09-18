<?php

namespace App\Notifications;

use App\Data\Models\Progress;
use Illuminate\Bus\Queueable;
use App\Data\Repositories\Notifications;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ProgressCreated
    extends Notification /// implements ShouldQueue
{
    use Queueable;

    protected $notificationsRepository;

    /**
     * @var Progress
     */
    protected $progress;

    public function __construct(Progress $progress)
    {
        $this->progress = $progress;

        $this->notificationsRepository = app(Notifications::class);
    }

    /**
     * @return mixed
     */
    private function getNotifiables()
    {
        return $this->progress->getNotifiables();
    }

    /**
     * @return string
     */
    private function getMessage()
    {
        return (
            'Um ou mais andamentos foram adicionados ao protocolo ' .
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
        $message = (new MailMessage())->line($this->getMessage());

        $message->action(
            'Ver andamento',
            route('progresses.show', $this->progress->id)
        );

        return $message;
    }
}
