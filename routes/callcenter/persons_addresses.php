<?php
Route::group(['prefix' => 'persons_addresses'], function () {
    Route::get('/create/{person_id}', 'PersonAddresses@create')->name(
        'persons_addresses.create'
    );
    Route::post('/', 'PersonAddresses@store')->name('persons_addresses.store');

    //Não funciona
    Route::get('/show/{id}', 'PersonAddresses@show')->name(
        'persons_addresses.show'
    );
});
