<?php

Route::filter('auth', function() {
    if (Auth::guest()) return Redirect::guest('login')->withPesan('Anda harus login dulu');
});
Route::filter('guest', function() {
    if (Auth::check()) return Redirect::to('admin');
});

Route::filter('user', function() {
	if(!Entrust::hasRole('User')) {
		return Redirect::back()->withPesan('Hanya user yang diizinkan mengakses fitur tersebut!');
	}
});