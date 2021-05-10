<?php
Route::group(['prefix' => 'people_addresses'], function () {
    Route::get('/', 'PersonAddresses@index')->name('people_addresses.index');
    Route::get('/create/{person_id}', 'PersonAddresses@create')->name('people_addresses.create');
    Route::post('/', 'PersonAddresses@store')->name('people_addresses.store');

    //Não funciona
    Route::get('/show/{id}', 'PersonAddresses@show')->name('people_addresses.show');
});
