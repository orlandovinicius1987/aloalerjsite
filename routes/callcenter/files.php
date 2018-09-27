<?php

Route::group(['prefix' => 'files'], function () {
    Route::post('/', 'Files@upload')->name('files.upload');
});
