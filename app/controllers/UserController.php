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
		return View::make('bagikasih.edit_profile.index');
	}

}
