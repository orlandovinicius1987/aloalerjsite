<?php
Route::get('/', 'People@index')->name('people.index');

Route::group(['prefix' => 'people'], function () {
    Route::get('/', 'People@index')->name('people.index');
    Route::get('/create', 'People@create')->name('people.create');
    Route::get('/diverge', 'People@diverge')->name('people.diverge-name');
    Route::post('/diverge', 'People@storeDiverge')->name('people.store-diverge');
    Route::post('/', 'People@store')->name('people.store');
    Route::get('/show/{person_id}', 'People@show')->name('people.show');
});
