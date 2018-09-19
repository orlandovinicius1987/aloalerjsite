<?php
Route::group(['prefix' => 'records'], function () {
    Route::get('/create/{person_id}', 'Records@create')->name('records.create');
    Route::post('/', 'Records@store')->name('records.store');
    Route::get('/show/{id}', 'Records@show')->name('records.show');
    Route::get('/', 'Records@index')->name('records.index');
    Route::get('/non-resolved', 'Records@nonResolved')->name(
        'records.nonResolved'
    );
    Route::get('/workflow/{record_id}', 'Records@workflow')->name(
        'records.workflow'
    );
    Route::post('/finish', 'Records@storeAndFinish')->name(
        'records.storeAndFinish'
    );
});
