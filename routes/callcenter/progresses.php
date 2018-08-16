<?php
Route::group(['prefix' => 'progresses'], function () {
    //Não funciona
    Route::get('/', 'Progresses@index')->name('progresses.index');

    Route
        ::get('/create/{record_id}', 'Progresses@create')
        ->name('progresses.create');

    Route::post('/', 'Progresses@store')->name('progresses.store');
    Route
        ::post('/finish', 'Progresses@storeAndFinish')
        ->name('progresses.storeAndFinish');

    Route::get('/show/{id}', 'Progresses@show')->name('progresses.show');
});
