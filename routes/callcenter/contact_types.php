<?php
Route::group(['prefix' => 'contact_types'], function () {
    Route::get('/array/', 'ContactTypes@array')->name('contact_types.array');
});
