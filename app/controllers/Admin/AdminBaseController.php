<?php

class AdminBaseController extends BaseController {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function admin(){

		if (Request::isMethod('post')){
			$rules = array(
	        	'email'            => 'required|email',     // required and must be unique in the ducks table
	    	    'password'         => 'required',
		    );

		    $validator = Validator::make(Input::all(), $rules);

		    if ($validator->fails()) {
		    	$messages = $validator->messages();
	        	return Redirect::route('signin')->withErrors($validator);
		    }else{

		    	$input = array(
	        		'email'            => Input::get('email'),     // required and must be unique in the ducks table
	    	    	'password'         => md5(Input::get('password')),
		    	); 

		    	$login = Auth::attempt($input);
		    	if($login){
		    		// return Auth::user()->role;
		    		if(Auth::user()->role == 1){
		    			return Redirect::route('admin.dashboard');
		    		}
		    		else{
						Auth::logout();
						Session::flush();
		    			Session::flash('gagal','Username yang anda masukan bukan administrator');
		    			return Redirect::route('signin');
		    		}
		    	}else{
		    		Session::flash('gagal','Username atau email salah');
		    		return Redirect::route('signin');
		    	}

		    }
		}
		return View::make('admin.includes.signin');
	}

	public function signout(){
		Auth::logout();
		Session::flush();
		return Redirect::route('signin');
	}

}
