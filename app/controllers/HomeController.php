<?php

class HomeController extends BaseController {

	public function index() {
		return View::make('admin.index')->withTitle('Dashboard');
	}

	public function login() {
		return View::make('login')->withTitle('Login');
	}

	public function guest() {
		$posts = Post::all();
		return View::make('guest.index', compact('posts'))->withTitle('Home');
	}

	public function auth() {
		$input = Input::all();

		$validator = Validator::make($input, [
                'username' => 'required',
                'password' => 'required',
            ]);

        if($validator->fails()){
            return Redirect::back()->withPesan('Form input harus diisi')->withInput();
        }
        if(!Auth::attempt( ['username' => $input['username'], 'password' => $input['password'] ] )) {
        	return Redirect::back()->withPesan('Username /Password salah')->withInput();
        }
        return Redirect::to('admin')->withPesan('Anda berhasil login');
	}

	public function logout() {
		if(!Auth::check()) {
			return Redirect::back()->withPesan('Terdapat kesalahan');
		}
	  	Auth::logout();
		return Redirect::to('login')->withPesan('Berhasil logout');
	}

}
