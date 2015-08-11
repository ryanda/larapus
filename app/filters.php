<?php

Route::filter('auth', function() {
    if (Auth::guest()) return Redirect::to('/')->withPesan('Anda harus login dulu');
});

Route::filter('guest', function() {
    if (Auth::check()) return Redirect::to('admin');
});

Route::filter('admin', function() {
	if(!Entrust::hasRole('Admin')) {
		return Redirect::back()->withPesan('Anda tidak dapat mengakses halaman itu');
	}
});