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
	Route::resource('books', 'BooksController');
});

// user
Route::get('/', [
	'as' => 'home', 
	'uses' => 'HomeController@guest' ]);
Route::group(['before' => 'auth'], function() {
	Route::get('books', ['as'=>'member.books', 'uses'=>'MemberController@books']);
	Route::get('books/{book}/borrow', ['as'=>'books.borrow', 'uses'=>'MemberController@borrow']);
});