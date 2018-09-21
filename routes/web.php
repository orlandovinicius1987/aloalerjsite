<?php
Auth::routes();

Route::get('/', ['as' => 'home', 'uses' => 'Home@index']);

Route::get('/offline', ['as' => 'home', 'uses' => 'Home@offline']);

Route::get('comissoes/{name}', [
    'as' => 'committees.show',
    'uses' => 'Committees@show',
]);

Route::get('pages/{name}', ['as' => 'pages.show', 'uses' => 'Pages@show']);

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

Route::get('/protocolo/{protocolo}', 'CallCenter\Records@showPublic')->name(
    'records.show-public'
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

        Route::group(['prefix' => 'committees'], function () {
            Route::get('/create', 'Committees@create')->name(
                'committees.create'
            );
            Route::post('/', 'Committees@store')->name('committees.store');
            Route::get('/show/{id}', 'Committees@details')->name(
                'committees.details'
            );
            Route::get('/', 'Committees@index')->name('committees.index');
        });
    }
);
