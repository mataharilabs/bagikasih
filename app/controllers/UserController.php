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

	public function show($id)
	{
		// init
		$data = array();

		// get user data
		if (is_integer($id))
		{
			// with ID
			$user = User::with('city')->find($id);
		}
		else
		{
			// with slug
			$user = User::with('city')->where('slug', '=', $id)->where('status', '=', 1)->first();
		}

		if ($user == null) return App::abort('404');

		// get user's activities
		$activities = User::getSocialActivity($user->id);

		// set data
		$data = array(
			'user' => $user,
			'activities' => $activities,
		);

		return View::make('bagikasih.user.index', $data);
	}

	public function editprofile()
	{
		$data['city'] = City::getAll();

		$data['photo'] = Photo::getByUser(Auth::user()->id);

		return View::make('bagikasih.edit_profile.index',$data);
	}

	public function updateprofile(){

		  if (Input::file('file')) {

		      $destinationPath = public_path().'/photos';

		      $extension = Input::file('file')->getClientOriginalExtension();
		      
		      $fileName = rand(11111,99999).'.'.$extension; // renameing image

		      Input::file('file')->move($destinationPath, $fileName); // uploading file to given path

		      Photo::recordImage($fileName);
		  }
		 
		  $input =  array(
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

		 	 Session::flash('failed', 'Edit profile is successfull'); 

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

}
