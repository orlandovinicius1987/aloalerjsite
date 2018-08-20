<?php
Route::group(['prefix' => 'persons_contacts'], function () {
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
});
