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

	public function register(){
		return false;
	}

	public function logout(){
		return false;
	}

}
