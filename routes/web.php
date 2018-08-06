<?php
Auth::routes();

Route::get('/', ['as' => 'home', 'uses' => 'Home@index']);

Route::get('/offline', ['as' => 'home', 'uses' => 'Home@offline']);

Route::get('comissoes/{name}', [
    'as' => 'committees.show',
    'uses' => 'Committees@show',
]);

Route::get('pages/{name}', ['as' => 'pages.show', 'uses' => 'Pages@show']);

//Route::get('comissoes/{name}', ['as' => 'page', 'uses' => 'Committees@view']);

Route::group(['prefix' => 'chat'], function () {
    Route::get('index', ['as' => 'chat.index', 'uses' => 'Chat@index']);
    Route::get('create', ['as' => 'chat.create', 'uses' => 'Chat@create']);
    Route::get('terminated', [
        'as' => 'chat.terminated',
        'uses' => 'Chat@terminated',
    ]);
});

Route::group(['prefix' => 'tv'], function () {
    Route::get('/', ['as' => 'tv.index', 'uses' => 'Tv@index']);
});

Route::group(['prefix' => 'radio'], function () {
    Route::get('/', ['as' => 'radio.index', 'uses' => 'Radio@index']);
});

Route::group(['prefix' => 'contact'], function () {
    Route::get('/', ['as' => 'contact.index', 'uses' => 'Contact@index']);
    Route::get('pretend', [
        'as' => 'contact.index',
        'uses' => 'Contact@pretend',
    ]);
    Route::post('/', ['as' => 'contact.post', 'uses' => 'Contact@post']);
});

Route::get('/home', 'Home@index')->name('home');

//Route::group(['prefix' => 'callcenter', 'middleware' => ['auth']], function()
Route::group(['prefix' => 'callcenter'], function () {
    Route::get('/', [
        'as' => 'callcenter.home.index',
        'uses' => 'CallCenter\Home@index',
    ]);

    Route::group(['prefix' => 'persons'], function () {
        Route::get('/', 'PersonsController@index')->name('persons.index');
        Route::get('/create', 'PersonsController@create')->name(
            'persons.create'
        );
        Route::post('/', 'PersonsController@store')->name('persons.store');
        Route::get('/show/{cpf_cnpj}', 'PersonsController@show')->name(
            'persons.show'
        );
    });

    Route::group(['prefix' => 'personsAddresses'], function () {
        Route::get('/', 'PersonsAddressesController@index')->name(
            'personsAddresses.index'
        );
        Route::get(
            '/create/{person_id}',
            'PersonsAddressesController@create'
        )->name('personsAddresses.create');

        Route::post('/', 'PersonsAddressesController@store')->name(
            'personsAddresses.store'
        );
        Route::get('/show/{id}', 'PersonsAddressesController@show')->name(
            'personsAddresses.show'
        );
    });

    Route::group(['prefix' => 'personsContacts'], function () {
        Route::get('/', 'PersonsContactsController@index')->name(
            'personsContacts.index'
        );
        Route::get(
            '/create/{person_id}',
            'PersonsContactsController@create'
        )->name('personsContacts.create');
        Route::post('/', 'PersonsContactsController@store')->name(
            'personsContacts.store'
        );
        Route::get('/show/{id}', 'PersonsContactsController@show')->name(
            'personsContacts.show'
        );
    });

    Route::group(['prefix' => 'origins'], function () {
        Route::get('/', 'OriginsController@index')->name('origins.index');
        Route::get('/create', 'OriginsController@create')->name(
            'origins.create'
        );
        Route::post('/', 'OriginsController@store')->name('origins.store');
        Route::get('/show/{id}', 'OriginsController@show')->name(
            'origins.show'
        );
    });

    Route::group(['prefix' => 'areas'], function () {
        Route::get('/', 'AreasController@index')->name('areas.index');
        Route::get('/create', 'AreasController@create')->name('areas.create');
        Route::post('/', 'AreasController@store')->name('areas.store');
        Route::get('/show/{id}', 'AreasController@show')->name('areas.show');
    });

    Route::group(['prefix' => 'calls'], function () {
        Route::get('/', 'CallsController@index')->name('calls.index');
        Route::get('/create/{person_id}', 'CallsController@create')->name(
            'calls.create'
        );
        Route::post('/', 'CallsController@store')->name('calls.store');
        Route::get('/show/{id}', 'CallsController@show')->name('calls.show');
    });
});
