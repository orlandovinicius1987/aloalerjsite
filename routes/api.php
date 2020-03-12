<?php

Route::group(
    ['prefix' => 'v1', 'middleware' => ['auth:api', 'app.users']],
    function () {
        Route::get('zipcode/{zipcode}', 'Api\ZipCode@get')->name(
            'api.zipcode.get'
        );

        Route::post('search', 'Api\Search@execute')->name('api.search.execute');

        Route::post('committees-search/', 'Api\CommitteesSearch@execute')->name(
            'api.commiteesSearch.execute'
        );

        Route::post(
            'convert-extension-to-icon/',
            'Api\File@convertExtensionToIcon'
        )->name('api.file.convertExtensionToIcon');
    }
);
