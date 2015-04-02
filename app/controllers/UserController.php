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
		$activities = null;

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
		
		return View::make('bagikasih.edit_profile.index',$data);
	}

}
