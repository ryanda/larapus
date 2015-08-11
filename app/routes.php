<?php

// auth function
Route::get('login', [
	'uses' => 'HomeController@login',
	'before' => 'guest' ]);
Route::post('login', 'HomeController@auth');
Route::get('logout', 'HomeController@logout');

Route::group(['before' => 'auth', 'prefix' => 'admin'], function() {
	Route::get('/', [
		'as' => 'admin',
		'uses' => 'HomeController@index' ]);
	Route::resource('authors', 'AuthorsController');
});

// user
Route::get('/', [
	'as' => 'home', 
	'uses' => 'HomeController@guest' ]);
