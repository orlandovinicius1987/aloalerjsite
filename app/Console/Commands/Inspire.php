<?php

namespace App\Console\Commands;

use Mail;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class Inspire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inspire';

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
//        $this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);

	    foreach (readCSV() as $key => $person)
	    {
		    $this->sendMail($person, $key);
	    }
    }

	private function sendMail($person, $key)
	{
		$emails = explode(";", $person[9]);

		foreach ($emails as $email)
		{
			$this->output->note($key + 1 . " - " . $email . " - " . $person[9]);

			Mail::send('mail', ['person' => $person], function ($m) use ($person, $email)
			{
				$m->to($email)->subject(utf8_encode( 'Convite - Modernização do Legislativo Fluminense' ));
			});
		}
	}
}
