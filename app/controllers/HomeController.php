<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		return View::make('bagikasih.home.index');
	}

	public function signin(){
		$input = array(
			    	'email' => !Input::get('email') ? '' : Input::get('email'),
					'password' => !Input::get('password') ? '' : md5(Input::get('password'))
				 );
		$signin = User::signin($input);
		return $signin;
	}

	public function signup(){
		$input = array(
			    	'firstname' => !Input::get('firstname') ? '' : Input::get('firstname'),
			    	'lastname' => !Input::get('lastname') ? '' : Input::get('lastname'),
			    	'phone_number' => !Input::get('phone_number') ? '' : Input::get('phone_number'),
			    	'email' => !Input::get('email') ? '' : Input::get('email'),
					'password' => !Input::get('password') ? '' : md5(Input::get('password')),
					'password_confirm' => !Input::get('password_confirm') ? '' : md5(Input::get('password_confirm'))
				 );
		$signup = User::signup($input);
		return $signup;
	}

	public function logout(){
		Auth::logout();
		Session::flush();
		return Redirect::to('/');
	}

	public function login(){
		return View::make('bagikasih.home.login');
	}

}
