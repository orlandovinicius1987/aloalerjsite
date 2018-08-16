<?php
Route::group(['prefix' => 'records'], function () {
    Route::get('/create/{person_id}', 'Records@create')->name('records.create');
    Route::post('/', 'Records@store')->name('records.store');
    Route::get('/show/{id}', 'Records@show')->name('records.show');
});
