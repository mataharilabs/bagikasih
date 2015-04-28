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
		// dd(Session::all());
		return View::make('bagikasih.home.index');
	}

	public function signin(){
		$input = array(
			    	'email' => !Input::get('email') ? '' : Input::get('email'),
					'password' => !Input::get('password') ? '' : md5(Input::get('password'))
				 );
		$signin = User::signin($input, Session::get('user_connect'));
		return $signin;
	}

	public function signup()
	{
		if (Request::ajax())
		{
			$input = array(
				    	'firstname' => !Input::get('firstname') ? '' : Input::get('firstname'),
				    	'lastname' => !Input::get('lastname') ? '' : Input::get('lastname'),
				    	'phone_number' => !Input::get('phone_number') ? '' : Input::get('phone_number'),
				    	'email' => !Input::get('email') ? '' : Input::get('email'),
						'password' => !Input::get('password') ? '' : md5(Input::get('password')),
						'password_confirm' => !Input::get('password_confirm') ? '' : md5(Input::get('password_confirm'))
					 );

			$signup = User::signup($input, Session::get('user_connect'));
			
			return $signup;
		}
		else
		{
			// init
			$input = Input::all();

			if (Session::has('user_connect'))
			{
				if (Session::get('user_connect.provider') == 'facebook')
				{
					$input['firstname'] = Session::get('user_connect.first_name');
					$input['lastname'] = Session::get('user_connect.last_name');
					$input['email'] = Session::get('user_connect.email');
				}
				else if (Session::get('user_connect.provider') == 'twitter')
				{
					$name = explode(' ', Session::get('user_connect.name'));
					$input['firstname'] = $name[0];
					$input['lastname'] = $name[1];
				}
			}

			if (Input::has('redirect'))	
			{
				$redirecturl = Input::get('redirect');
			}
			else if (Session::has('redirect'))
			{
				$redirecturl = str_replace('_', '/', Session::get('redirect'));

				Session::forget('redirect');

				$input['currenturl'] = $redirecturl;
			}
			else
			{
				$redirecturl = '';
			}

			// set currenturl
			$input['currenturl'] = $redirecturl;

			// show form of signup
			return View::make('bagikasih.home.signup', $input);
		}
	}

	public function logout(){
		Auth::logout();
		Session::flush();
		return Redirect::to('/');
	}

	public function login()
	{
		// init
		$data = array();

		if (Input::has('redirect'))	
			{
				$redirecturl = Input::get('redirect');
			}
			else if (Session::has('redirect'))
			{
				$redirecturl = str_replace('_', '/', Session::get('redirect'));

				Session::forget('redirect');

				$input['currenturl'] = $redirecturl;
			}
			else
			{
				$redirecturl = '';
			}

			// set currenturl
			$data['currenturl'] = $redirecturl;
		
		return View::make('bagikasih.home.login', $data);
	}

	/**
	* Login user with facebook
	*
	* @return void
	*/

	public function signinWithFacebook()
	{
		if (Input::has('redirect'))
		{
			// save redirect url
			Session::put('redirect', Input::get('redirect'));
		}

		// get data from input
		$code = Input::get( 'code' );

		// get fb service
		$fb = OAuth::consumer( 'Facebook' );

		// check if code is valid

		// if code is provided get user data and sign in
		if ( !empty( $code ) ) {

		    // This was a callback request from facebook, get the token
		    $token = $fb->requestAccessToken( $code );

		    // Send a request with it
		    $result = json_decode( $fb->request( '/me' ), true );

		    $result['provider'] = 'facebook';
		    $result['token'] = $token->getAccessToken();

		    // check user connect
			return $this->checkUserConnect('facebook', $result);
		}
		// if not ask for permission first
		else {
		    // get fb authorization
		    $url = $fb->getAuthorizationUri();

		    // return to facebook login url
		    return Redirect::to( (string)$url );
		}

	}

	public function signinWithTwitter()
	{
		if (Input::has('redirect'))
		{
			// save redirect url
			Session::put('redirect', Input::get('redirect'));
		}

		// get data from input
		$token = Input::get( 'oauth_token' );
		$verify = Input::get( 'oauth_verifier' );

		// get twitter service
		$tw = OAuth::consumer( 'Twitter' );

		// check if code is valid

		// if code is provided get user data and sign in
		if ( !empty( $token ) && !empty( $verify ) ) {

			// This was a callback request from twitter, get the token
			$token = $tw->requestAccessToken( $token, $verify );

			// Send a request with it
			$result = json_decode( $tw->request( 'account/verify_credentials.json' ), true );

			$result['provider'] = 'twitter';
		    $result['token'] = $token->getAccessToken();
		    $result['verifier'] = $verify;

			// check user connect
			return $this->checkUserConnect('twitter', $result);

		}
		// if not ask for permission first
		else {
			// get request token
			$reqToken = $tw->requestRequestToken();

			// get Authorization Uri sending the request token
			$url = $tw->getAuthorizationUri(array('oauth_token' => $reqToken->getRequestToken()));

			// return to twitter login url
			return Redirect::to( (string)$url );
		}
	}

	private function checkUserConnect($provider = 'facebook', $result)
	{
		// save to session
		Session::put('user_connect', $result);

		// check in User Connect table
		$user_connect = UserConnect::with(array('user'));

		if ($provider == 'facebook')
		{
			$user_connect = $user_connect->where('facebook_user_id', '=', $result['id']);
		}
		else if ($provider == 'twitter')
		{
			$user_connect = $user_connect->where('twitter_user_id', '=', $result['id'])
					->orWhere('twitter_oauth_verifier', '=', $result['verifier']);
		}
									
		$user_connect = $user_connect->first();

		if ($user_connect)
		{
			// auto sign in
			$input = array('id' => $user_connect->user_id, 'password' => $user_connect->user->password);

			Auth::attempt($input);

			if (Session::has('redirect'))
			{
				$redirecturl = str_replace('_', '/', Session::get('redirect'));

				Session::forget('redirect');

				return Redirect::to($redirecturl);
			}

			return Redirect::to('');
		}
		else
		{
			// init
			$redirecturl = '';

			if (Session::has('redirect'))
			{
				$redirecturl = str_replace('_', '/', Session::get('redirect'));

				Session::forget('redirect');
			}

			// redirect to signup
			return Redirect::route('signup')->with('redirecturl', $redirecturl);
		}
	}
}
