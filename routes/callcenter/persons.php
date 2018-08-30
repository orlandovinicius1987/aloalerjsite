<?php
Route::get('/', 'People@index')->name('persons.index');

Route::group(['prefix' => 'persons'], function () {
    Route::get('/', 'People@index')->name('persons.index');
    Route::get('/create/{search?}', 'People@create')->name('persons.create');
    Route::post('/', 'People@store')->name('persons.store');
    Route::get('/show/{person_id}', 'People@show')->name('persons.show');
});
