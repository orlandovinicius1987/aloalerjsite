<?php
Auth::routes();



Route::get('/', ['as' => 'home', 'uses' => 'Home@index']);

Route::get('/offline', ['as' => 'home', 'uses' => 'Home@offline']);



Route::get('services/{id}', [
    'as' => 'services.show',
    'uses' => 'Services@show'
]);

Route::group(['prefix' => 'pages'], function () {
    Route::get('/committees', ['as' => 'pages.committees', 'uses' => 'Pages@committees']);
    Route::get('/aloalerj', ['as' => 'pages.aloalerj', 'uses' => 'Pages@aloalerj']);
    Route::get('/telefones', ['as' => 'pages.telefones', 'uses' => 'Pages@telefones']);
    Route::get('/protocolo', ['as' => 'pages.protocolo', 'uses' => 'Pages@protocolo']);
    Route::get('/contact', ['as' => 'pages.contact', 'uses' => 'Pages@contact']);
});

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

Route::get('/protocolo/{protocol}', 'CallCenter\Records@showPublic')->name(
    'records.show-public'
);

Route::post('/protocolo', 'CallCenter\Records@searchShowPublic')->name(
    'records.search-show-public'
);

Route::get('/pesquisa/protocolo', 'CallCenter\Records@searchProtocol')->name(
    'records.search'
);

Route::post(
    '/pesquisa/protocolo',
    'CallCenter\Records@showByProtocolNumber'
)->name('records.search');



Route::group(
    [
        'prefix' => 'callcenter',
        'middleware' => ['auth', 'app.users'],
        'namespace' => 'CallCenter',
    ],
    function () {
        require __DIR__ . '/callcenter/contact_types.php';

        require __DIR__ . '/callcenter/people.php';

        require __DIR__ . '/callcenter/people_addresses.php';

        require __DIR__ . '/callcenter/people_contacts.php';

        require __DIR__ . '/callcenter/progresses.php';

        require __DIR__ . '/callcenter/records.php';

        require __DIR__ . '/callcenter/files.php';

        Route::group(['prefix' => 'areas'], function () {

            Route::get('/', 'Areas@index')->name('areas.index')->middleware('canAny:areas:store, areas:update');
            Route::post('/store', 'Areas@store')->name('areas.store');
            Route::get('/createArea', 'Areas@create')->name('areas.create')->middleware('can:areas:store');
            Route::get('/show/{id}', 'Areas@details')->name('areas.details')->middleware('canAny:areas:store, areas:update');

        });

        Route::group(['prefix' => 'committees'], function () {
            Route::get('/create', 'Committees@create')->name('committees.create')->middleware('can:committees:store');
            Route::post('/store', 'Committees@store')->name('committees.store');
            Route::get('/show/{id}', 'Committees@details')->name('committees.details')->middleware('canAny:committees:update, committees:store');
            Route::get('/', 'Committees@index')->name('committees.index')->middleware('canAny:committees:store,committees:update');

            Route::group(['prefix' => 'committee-service'], function () {

                Route::get('/create/{id}', 'CommitteeServices@create')->name(
                    'committee_services.create'
                );

                Route::post('/', 'CommitteeServices@store')->name('committee_services.store');

                Route::get('/show/{id}', 'CommitteeServices@details')->name(
                    'committee_services.details'
                );
            });
        });
    }
);
