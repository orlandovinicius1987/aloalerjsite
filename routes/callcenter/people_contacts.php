<?php
Route::group(['prefix' => 'people_contacts'], function () {
    Route::get('/', 'PersonContacts@index')->name('people_contacts.index');

    Route::get('/create/{person_id}', 'PersonContacts@create')->name('people_contacts.create');
    Route::post('/', 'PersonContacts@storeViaWorkflow')->name('people_contacts.storeViaWorkflow');

    Route::get('/show/{id}', 'PersonContacts@show')->name('people_contacts.show');

    Route::post('/insertContact', 'PersonContacts@insertContact')->name(
        'people_contacts.insertContact'
    );

    Route::get('/createOutside/{id}', 'PersonContacts@createOutside')->name(
        'people_contacts.createOutside'
    );

    Route::post('/update', 'PersonContacts@update')->name('people_contacts.update');
});
