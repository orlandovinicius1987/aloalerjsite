<?php

Route::get('/', ['as' => 'home', 'uses' => 'Home@index']);

Route::get('/comissoes/{name}', ['as' => 'page', 'uses' => 'Committees@view']);
