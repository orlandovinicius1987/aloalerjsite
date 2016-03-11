<?php

Route::get('/', ['as' => 'home', 'uses' => 'Home@index']);

Route::get('comissoes/{name}', ['as' => 'page', 'uses' => 'Committees@view']);

Route::group(['prefix' => 'chat'], function() {
    Route::get('create', ['as' => 'home', 'uses' => 'Chat@create']);
    Route::get('index', ['as' => 'home', 'uses' => 'Chat@index']);
    Route::get('terminated', ['as' => 'home', 'uses' => 'Chat@terminated']);
});

Route::group(['prefix' => 'tv'], function() {
    Route::get('/', ['as' => 'tv.index', 'uses' => 'TV@index']);
});
