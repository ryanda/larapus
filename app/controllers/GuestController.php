<?php 

class GuestController extends \BaseController {
	public function index() {
		if (Auth::check()) {
			return Redirect::route('admin');
		}
		return View::make('guest.index')->withTitle('Daftar Buku');
	}
}