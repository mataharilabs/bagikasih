<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	 protected $guarded = array();  // Important

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

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return Hash::make($this->password);
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

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

	public static function updateprofile($input){
		$rules =  array(
			'firstname'=> 'required',
			'lastname'=> 'required',
			'email'=> 'required|email',
			'phone_number'=> 'required',
			'slug' => 'required',
			'birthday' => 'required',
		 );

		$validator = Validator::make($input, $rules);

  	  	if ($validator->fails()) {
  	 		return $validator->errors()->all();
	    } 
	    else {
	    	// $user = User::create($input);
	    	try {
	    		$user = User::find(Auth::user()->id)->update($input);
	    		return "ok";
	    	} catch (Exception $e) {
	    		return "no";
	    	}

	    }
	}

	public static function signup($input){
		
		$rules = array(
	    	'firstname' => 'required',
	    	'lastname' => 'required',
	    	'phone_number' => 'required',
	    	'email' => 'required|email',
			'password' => 'required',
			'password_confirm' => 'required|same:password'
		);
  	  	
  	  	$validator = Validator::make($input, $rules);

  	  	if ($validator->fails()) {
  	 		return $validator->errors()->all();
	    } 
	    else {
		   	
		   	$lastRecord = User::orderBy('id', 'DESC')->first();
	    	$slug = '';

	    	$checkFstnameLstname = User::where('slug', $input['firstname'].$input['lastname'])
	    						  ->count();
	    	if($checkFstnameLstname > 0){
	    		$email = explode('@', $input['email']);
	    		$checkSlug = User::where('slug', $email[0])->count();
	    		if($checkSlug > 0){
	    			$slug = $input['firstname'].$input['lastname'].($lastRecord['id']+1);
	    		}
	    		else{
	    			$slug  = $email[0];
	    		}
	    	}else{
	    		$slug = $input['firstname'].$input['lastname'];
	    	}

	    	try {
		    	$post = new User;
	            $post->firstname 	 = $input['firstname'];
	            $post->lastname  	 = $input['lastname'];
	            $post->phone_number  = $input['phone_number'];
	            $post->email  	 	 = $input['email'];
	            $post->password  	 = $input['password'];
	            $post->slug  	 	 = $slug;
	            $post->save();

	            // update
	            $update = User::find($post->id);
				$update->slug  	 	 = $input['firstname'].$input['lastname'].$post->id;
	            $update->save();

	   			$session = array('email' => $input['email'],'password' => $input['password']);
	   			
	   			if(Auth::attempt($input)){
	   				return "sessionok";
	   			}
	   			else{
	            	return "sessionnot";
	   			}

	    	} catch (Exception $e) {
	            return "no";
	    	}

	    }	
	}

}
