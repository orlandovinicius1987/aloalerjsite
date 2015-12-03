<?php

Route::get('/', function () {
    return view('home.index');
});

Route::post('postform', function () {
	return \Input::all();
});

//Route::get('qrcode', function () {
//	return QrCode::size(1000)->generate('goo.gl/mbE136');
//});
//
//Route::get('presidentes', function ()
//{
//	foreach (readCSV() as $person)
//	{
//		return sendMail($person);
//	}
//
//	return $file;
//});
//
//function readCSV()
//{
//	$file = file(database_path(env('PERSONS_FILE')));
//
//	$result = [];
//
//	foreach ($file as $line)
//	{
//		$line = str_replace("\r\n", "", $line);
//
//		$line = explode("\t", $line);
//
//		$result[] = $line;
//	}
//
//	unset($result[0]);
//
//	return $result;
//}
//
//function sendMail($person)
//{
//	return view('mail')
//			->with('person', $person);
//}
