<?php

Route::group(['prefix' => 'files'], function () {
    Route::post('/upload', 'Files@upload')->name('files.upload');
    Route::post('/attach', 'AttachedFiles@attach')->name(
        'attachedFiles.attach'
    );
});
