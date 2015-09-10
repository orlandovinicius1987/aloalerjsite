<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('qrcode', function () {
	return QrCode::size(1000)->generate('goo.gl/mbE136');
});

Route::get('presidentes', function ()
{
	foreach (readCSV() as $person)
	{
		return sendMail($person);
	}

	return $file;
});

function readCSV()
{
	$file = file(database_path(env('PERSONS_FILE')));

	$result = [];

	foreach ($file as $line)
	{
		$line = str_replace("\r\n", "", $line);

		$line = explode("\t", $line);

		$result[] = $line;
	}

	unset($result[0]);

	return $result;
}

function sendMail($person)
{
	return view('mail')
			->with('person', $person);
}
