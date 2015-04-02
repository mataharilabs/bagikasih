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

	public function editprofile()
	{
		$data['city'] = City::getAll();
		
		return View::make('bagikasih.edit_profile.index',$data);
	}

}
