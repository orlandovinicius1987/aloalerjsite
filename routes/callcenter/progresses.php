<?php
Route::group(['prefix' => 'progresses'], function () {
    Route::get('/create/{record_id}', 'Progresses@create')->name(
        'progresses.create'
    );

    Route::post('/', 'Progresses@store')->name('progresses.store');
    Route::post('/finish', 'Progresses@storeAndFinish')->name(
        'progresses.storeAndFinish'
    );

    Route::get('/show/{id}', 'Progresses@show')->name('progresses.show');
});
