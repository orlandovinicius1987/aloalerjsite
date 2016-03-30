<?php

Route::get('/', ['as' => 'home', 'uses' => 'Home@index']);
Route::get('/offline', ['as' => 'home', 'uses' => 'Home@offline']);

Route::get('comissoes/{name}', ['as' => 'committees.show', 'uses' => 'Committees@show']);

//Route::get('comissoes/{name}', ['as' => 'page', 'uses' => 'Committees@view']);

Route::group(['prefix' => 'chat'], function()
{
    Route::get('index', ['as' => 'chat.index', 'uses' => 'Chat@index']);
    Route::get('create', ['as' => 'chat.create', 'uses' => 'Chat@create']);
    Route::get('terminated', ['as' => 'chat.terminated', 'uses' => 'Chat@terminated']);
});

Route::group(['prefix' => 'tv'], function()
{
    Route::get('/', ['as' => 'tv.index', 'uses' => 'Tv@index']);
});

Route::group(['prefix' => 'radio'], function()
{
    Route::get('/', ['as' => 'radio.index', 'uses' => 'Radio@index']);
});

Route::group(['prefix' => 'contact'], function()
{
    Route::get('/', ['as' => 'contact.index', 'uses' => 'Contact@index']);
    Route::post('/', ['as' => 'contact.post', 'uses' => 'Contact@post']);
});
