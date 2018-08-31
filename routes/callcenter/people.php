<?php
Route::get('/', 'People@index')->name('people.index');

Route::group(['prefix' => 'people'], function () {
    Route::get('/', 'People@index')->name('people.index');
    Route::get('/create/{search?}', 'People@create')->name('people.create');
    Route::post('/', 'People@store')->name('people.store');
    Route::get('/show/{person_id}', 'People@show')->name('people.show');
});
