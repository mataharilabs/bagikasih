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

	public function city()
	{
		return $this->belongsTo('City');
	}

	public function defaultPhoto()
	{
		return $this->belongsTo('Photo', 'default_photo_id');
	}

	public static function getSocialActivity($id)
	{
		// init
		$data = array();

		// get user data
		/*$user = User::find($id);
		dd($user->created_at);
		// get signup date
		$data[$user->created_at] = array('type' => 'user');*/

		// get social target
		$social_targets = SocialTarget::where('user_id', '=', $id)
										->where('status', '=', 1)
										->get();

		foreach ($social_targets as $social_target)
		{
			$data[$social_target->created_at->timestamp] = array(
				'type' => 'social_target',
				'object_name' => $social_target->name,
				'object_slug' => $social_target->slug,
			);
		}

		// get social action
		$social_actions = SocialAction::where('user_id', '=', $id)
										->where('status', '=', 1)
										->get();

		foreach ($social_actions as $social_action)
		{
			$data[$social_action->created_at->timestamp] = array(
				'type' => 'social_action',
				'object_name' => $social_action->name,
				'object_slug' => $social_action->slug,
			);
		}

		// get event
		$events = Events::where('user_id', '=', $id)
										->where('status', '=', 1)
										->get();

		foreach ($events as $event)
		{
			$data[$event->created_at->timestamp] = array(
				'type' => 'event',
				'object_name' => $event->name,
				'object_slug' => $event->slug,
			);
		}

		// get donation
		$donations = Donation::where('user_id', '=', $id)
								->where('status', '=', 1)
								->where('as_noname', '=', 0)
								->get();

		foreach ($donations as $donation)
		{
			$donation->setAppends(array('type'));
			
			$data[$donation->created_at->timestamp] = array(
				'type' => 'donation',
				'object_type' => $donation->type_name,
				'object_name' => $donation->type->name,
				'object_slug' => $donation->type->slug,
			);
		}

		// sort
		krsort($data);

		return $data;
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

	// session
	public static function getById(){
		$user = User::find(Auth::user()->id);
		return $user;
	}

	// 
	public static function getUserId($id){
		$user = User::find($id);
		return $user;
	}


	public static function usersetting($input){
		
		$sesison = array(
			'email' => Auth::user()->email,
			'password' => md5($input['oldpassword']),
		);

		if(Auth::attempt($sesison)){
			$update = array(
				'email' => $input['email'],
				'password' => md5($input['password']),
				'is_my_social_target_subscriber' => $input['is_my_social_target_subscriber'] ? $input['is_my_social_target_subscriber'] : 0,
				'is_my_social_action_subscriber' => $input['is_my_social_action_subscriber'] ? $input['is_my_social_action_subscriber'] : 0,
				'is_newsletter_subscriber' => $input['is_newsletter_subscriber'] ? $input['is_newsletter_subscriber'] : 0,
			);

		   	$user = User::find(Auth::user()->id)->update($update);
		   	return "ok";
		}
		else{
  		  	return "not";
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
