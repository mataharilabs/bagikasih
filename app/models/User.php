<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static function signin($input){
		$rules = array(
	    	'email'            => 'required|email',   
	    	'password'         => 'required',
		);
  	  	
  	  	$validator = Validator::make($input, $rules);

  	  	if ($validator->fails()) {
  	 		return $validator->errors()->all();
	    } 
	    else {
	    	if(Auth::attempt($input)) {
	    		return "ok";
	    	} 
	    	else {
	    		return "no";
	    	}
	    }
	}

	public static function signup(){

	}

}
