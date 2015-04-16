<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Social Action Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	public function index()
	{
		// init
		$data 	= array();

		// get users who are celebrities
		$users = User::where('is_celebrity', '=', 1)
						->orderBy('total_running_social_actions', 'desc')
						->get();

		$data['users'] = $users;

		return View::make('bagikasih.user.index', $data);
	}

	public function show($id)
	{
		// init
		$data = array();

		// get user data - with slug
		$user = User::with('city')->where('slug', '=', $id)->where('status', '=', 1)->first();

		if ($user == null) return App::abort('404');

		// get user's activities
		$activities = User::getSocialActivity($user->id);

		// set data
		$data = array(
			'user' => $user,
			'activities' => $activities,
		);

		return View::make('bagikasih.user.detail', $data);
	}

	public function editprofile()
	{
		$data['city'] = City::getAll();

		$data['photo'] = Photo::getByUser(Auth::user()->id);

		return View::make('bagikasih.edit_profile.index',$data);
	}

	public function updateprofile(){
		  
		  $upload_gambar = Photo::recordImage();
		 
		  $input =  array(
  						'default_photo_id'=> is_numeric($upload_gambar) ? $upload_gambar : 'NULL',
  						'firstname'=> Input::get('firstname'),
						'lastname'=> Input::get('lastname'),
						'email'=> Input::get('email'),
						'phone_number'=> Input::get('phone'),
						'slug' => Input::get('url'),
						'city_id' => (int) Input::get('city_id'),
						'birthday' => mktime(0,0,0,(int) Input::get('month'), (int) Input::get('date'), (int) Input::get('year')),
						'description' => Input::get('description'),
		  ); 
		 
		 $update = User::updateprofile($input);

		 if($update == 'ok'){
		 	 Session::flash('success', 'Edit profile is successfull'); 

		 	 return Redirect::route('edit_profile');
		 }
		 elseif($update == 'no'){

		 	 Session::flash('failed', 'Edit profile is failed'); 

		 	 return Redirect::route('edit_profile');

		 }
		 else{

		 	Session::flash('validation', $update); 

		 	return Redirect::route('edit_profile');
		 }

	}

	public function editsettings(){
		
		$data['user'] = User::getById();

		return View::make('bagikasih.edit_setting.index',$data);
	}

	public function posteditsettings(){

		$update = array(
			'email' => Input::get('email'),
			'password' => Input::get('newpassword'),
			'oldpassword' => Input::get('userpassword'),
			'is_my_social_target_subscriber' => Input::get('is_my_social_target_subscriber') ? Input::get('is_my_social_target_subscriber') : 0,
			'is_my_social_action_subscriber' => Input::get('is_my_social_action_subscriber') ? Input::get('is_my_social_action_subscriber') : 0,
			'is_newsletter_subscriber' => Input::get('is_newsletter_subscriber') ? Input::get('is_newsletter_subscriber') : 0,
		);

		$update = User::usersetting($update);

		if($update == 'ok'){
		 	 Session::flash('success', 'Users settings is successfull'); 

		 	 return Redirect::route('edit_settings');
		 }
		 elseif($update == 'not'){

		 	 Session::flash('failed', 'Your currenct password is wrong'); 

		 	 return Redirect::route('edit_settings');

		 }

	}

}
