<?php

namespace App\Console\Commands;

use Mail as Mailer;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class Mail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	    $this->sendMail($this->argument('email'));
    }

	private function sendMail($email)
	{
		$this->output->note($email);

		$person[10] = 'convite-MLF.jpg';

		Mailer::send('mail', ['person' => $person], function ($m) use ($person, $email)
		{
			$m->to($email)->subject(utf8_encode( 'Convite - Modernização do Legislativo Fluminense' ));
		});
	}
}
