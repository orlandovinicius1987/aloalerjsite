<?php

Route::group(['prefix' => 'v1'], function () {
    Route::get('zipcode/{zipcode}', 'Api\ZipCode@get')->name('api.zipcode.get');

    Route::post('search', 'Api\Search@execute')->name('api.search.execute');
});
