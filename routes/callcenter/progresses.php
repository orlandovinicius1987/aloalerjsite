<?php

Route::group(['prefix' => 'progresses'], function () {
    Route::get('/create/{record_id}', 'Progresses@create')->name(
        'progresses.create'
    );

    Route::get('/notify/{id}', 'Progresses@notify')->name('progresses.notify');

    Route::post('/', 'Progresses@store')->name('progresses.store');

    Route::post('/finish', 'Progresses@finishRecord')->name(
        'progresses.finishRecord'
    );

    Route::post('/open', 'Progresses@openRecord')->name(
        'progresses.openRecord'
    );

    Route::get('/show/{id}', 'Progresses@show')->name('progresses.show');
});
