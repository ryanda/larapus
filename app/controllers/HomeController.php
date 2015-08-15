<?php

class HomeController extends BaseController {

	public function dashboard() {
		$user = Auth::user();

		if ($user->hasRole('Admin')) {
			return View::make('admin.index')->withTitle('Dashboard Admin');
		}
		if ($user->hasRole('User')) {
			return View::make('user.index')
				->withTitle('Dashboard User')
				->withLastlogin($user->last_login->diffForHumans())
				->withBooks($user->books()->wherePivot('returned', 0)->get());
		}
	}

	public function login() {
		if (Auth::check()) {
			Session::reflash();
			return Redirect::to('admin');
		}
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
        $user = Auth::user();
        $user->last_login = new DateTime;
        $user->save();
        return Redirect::to('admin')->withPesan('Anda berhasil login');
	}

	public function logout() {
		if(!Auth::check()) {
			return Redirect::back()->withPesan('Terdapat kesalahan');
		}
	  	Auth::logout();
		return Redirect::to('/')->withPesan('Berhasil logout');
	}

}
