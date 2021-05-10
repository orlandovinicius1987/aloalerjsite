<?php

Route::group(['prefix' => 'files'], function () {
    Route::post('/upload', 'Files@upload')->name('files.upload');
    Route::post('/attach', 'AttachedFiles@attach')->name('attachedFiles.attach');

    Route::get('/{id}', 'AttachedFiles@download')->name('attachedFiles.download');

    Route::get('/{id}', 'Files@download')->name('files.download');
});
