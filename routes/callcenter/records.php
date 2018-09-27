<?php
Route::group(['prefix' => 'records'], function () {
    Route::get('/create/{person_id}', 'Records@create')->name('records.create');

    Route::post('/', 'Records@store')->name('records.store');

    Route::get('/show/{id}', 'Records@show')->name('records.show');

    Route::get('/', 'Records@index')->name('records.index');

    Route::get('/non-resolved', 'Records@nonResolved')->name(
        'records.nonResolved'
    );

    Route::get('/show-protocol/{id}', 'Records@showProtocol')->name(
        'records.show-protocol'
    );

    Route::get('/mark-as-resolved/{id}', 'Records@markAsResolved')->name(
        'records.mark-as-resolved'
    );

    Route::get('/reopen/{id}', 'Records@reopen')->name('records.reopen');
});
