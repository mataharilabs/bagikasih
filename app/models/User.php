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


	public $timestamps = true;

	public $guarded = array('id','default_photo_id');

	/**
   * Get a fresh timestamp for the model.
   *
   * @return (int) timestamp
   */
	public function freshTimestamp()
	{
		return time();
	}

	/**
	* Don't mutate our (int) to (string) '2000-00-00 00:00:00' on INSERT/UPDATE
	*
	* @return (int) timestamp
	*/
	public function fromDateTime($value)
	{
		return $value;
	}

	// Uncomment, if you don't want Carbon API on SELECTs
	// protected function asDateTime($value)
	// {
	//   return $value;
	// }

	/**
	* Reset the format for database stored dates to Unix Timestamp
	*
	* @return string
	*/
	public function getDateFormat()
	{
		return 'U'; // PHP date() Seconds since the Unix Epoch
	}

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

	public static function signin($input, $user_connect = null){
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
	    		
	    		// user connect
	            self::saveUserConnect(Auth::user()->id, $user_connect);

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
	    	try {
	    		$user = User::find(Auth::user()->id)->update($input);
	    		return "ok";
	    	} catch (Exception $e) {
	    		return "no";
	    	}

	    }
	}

	public static function signup($input,$user_connect = NULL)
	{
		
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
		   	
	    	// try {
		    	$post = new User;
	            $post->firstname 	 = $input['firstname'];
	            $post->lastname  	 = $input['lastname'];
	            $post->phone_number  = $input['phone_number'];
	            $post->email  	 	 = $input['email'];
	            $post->password  	 = $input['password'];
	            $post->save();

	    		$slug = '';
	    		$email = explode('@', $input['email']);

	            $checkSlug = User::where('slug', $email[0])->count();

	    		if($checkSlug > 0){
	    			$checkFirtsnameLastname = User::where('slug', $input['firstname'].$input['lastname'])->count();
	    			if($checkFirtsnameLastname > 0){
		    			$slug = $input['firstname'].$input['lastname'].($lastRecord['id']+1);
	    			}
	    			else{
	    				$slug = $input['firstname'].$input['lastname'];
	    			}
	    		}
	    		else{
	    			$slug  = $email[0];
	    		}

	            // update
	            $update = User::find($post->id);
				$update->slug  = $slug;
	            $update->save();

	            // user connect
	            self::saveUserConnect($post->id, $user_connect);

	   			$session = array('email' => $input['email'],'password' => $input['password']);
	   			
	   			if(Auth::attempt($session)){
	   				return "sessionok";
	   			}
	   			else{
	            	return "sessionnot";
	   			}

	    	// } catch (Exception $e) {
	     //        return "no";
	    	// }

	    }	
	}

	public static function saveUserConnect($user_id, $user_connect = null)
	{
		if ($user_connect != null)
        {
        	$connect = UserConnect::where('user_id', '=', $user_id)->first();

        	if ($connect == null)
        	{
        		$connect = new UserConnect;
        		$connect->user_id = $user_id;	
        	}
        	
        	if ($user_connect['provider'] == 'facebook')
        	{
            	// TODO : save profile picture
        		/*$url = 'http://graph.facebook.com/'.$user_connect['id'].'/picture';
				$data = file_get_contents($url);
				$fileName = 'assetsfb_profilepic.jpg';
				$file = fopen($fileName, 'w+');
				fputs($file, $data);
				fclose($file);*/

            	$connect->facebook_user_id = $user_connect['id'];
            	$connect->facebook_oauth_token = $user_connect['token'];
            }
			else if ($user_connect['provider'] == 'twitter')
        	{
            	// TODO : save profile picture
        		/*$url = $user_connect['profile_image_url'];
				$data = file_get_contents($url);
				$fileName = 'assetsfb_profilepic.jpg';
				$file = fopen($fileName, 'w+');
				fputs($file, $data);
				fclose($file);*/

            	$connect->twitter_user_id = $user_connect['id'];
            	$connect->twitter_oauth_verifier = $user_connect['verifier'];
            	$connect->twitter_oauth_token = $user_connect['token'];
            }

        	$connect->save();
        }
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author Onel 
	 **/
	public static function add(array $input)
	{
		return User::create($input);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author Onel 
	 **/
	public static function edit(array $input)
	{				
		$data 				= User::findOrFail($input['id']);		
		$data->city_id		= $input['city_id'];
		$data->firstname	= $input['firstname'];
		$data->lastname		= $input['lastname'];
		$data->email		= $input['email'];
		$data->description	= $input['description'];
		$data->password		= $input['password'];
		$data->phone_number = $input['phone_number'];
		$data->slug			= $input['slug'];	
		$data->is_celebrity	= $input['is_celebrity'];
		$data->is_my_social_target_subscriber 	=  $input['is_my_social_target_subscriber'];
		$data->is_my_social_action_subscriber 	=  $input['is_my_social_action_subscriber'];
		$data->is_newsletter_subscriber 		=  $input['is_newsletter_subscriber'];
		$data->status		= $input['status'];
		$data->role			= $input['role'];
		return $data->save();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author Onel 
	 **/
	public static function remove($id)
	{
		$data = User::findOrFail($id);		
		return $data->delete();
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function optionsCity()
	{
		return City::lists('name', 'id');
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function isExist($id)
	{
		$count1 = SocialTarget::where('user_id', $id)->count();
		$count2 = SocialAction::where('user_id', $id)->count();
		$count3 = Events::where('user_id', $id)->count();		
		$count 	=	($count1 + $count2 + $count3);

		if($count > 0)
		{
			return true;
		}
		return false;	
	}
}
