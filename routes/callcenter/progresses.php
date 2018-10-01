<?php

Route::group(['prefix' => 'progresses'], function () {
    Route::get('/create/{record_id}', 'Progresses@create')->name(
        'progresses.create'
    );

    Route::get('/notify/{id}', 'Progresses@notify')->name('progresses.notify');

    Route::post('/', 'Progresses@store')->name('progresses.store');

    Route::post(
        '/store-and-mark-as-resolved',
        'Progresses@storeAndMarkAsResolved'
    )->name('progresses.store-and-mark-as-resolved');

    Route::post('/store-and-reopen', 'Progresses@storeAndReopen')->name(
        'progresses.store-and-reopen'
    );

    Route::get('/show/{id}', 'Progresses@show')->name('progresses.show');
});
