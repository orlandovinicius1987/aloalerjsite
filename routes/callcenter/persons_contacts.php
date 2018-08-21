<?php
Route::group(['prefix' => 'persons_contacts'], function () {
    Route::get('/', 'PersonContacts@index')->name('persons_contacts.index');

    Route::get('/create/{person_id}', 'PersonContacts@create')->name(
        'persons_contacts.create'
    );
    Route::post('/', 'PersonContacts@store')->name('persons_contacts.store');

    //Falta fazer
    Route::get('/show/{id}', 'PersonContacts@show')->name(
        'persons_contacts.show'
    );

    Route::post('/insertContact', 'PersonContacts@insertContact')->name(
        'persons_contacts.insertContact'
    );

    Route::get('/createOutside/{id}', 'PersonContacts@createOutside')->name(
        'persons_contacts.createOutside'
    );
});
