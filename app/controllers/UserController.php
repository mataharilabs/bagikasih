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

	public function updateprofile(){

		  $file = array('image' => Input::file('file'));
		  // setting up rules
		  $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
		  // doing the validation, passing post data, rules and the messages
		  $validator = Validator::make($file, $rules);
		  if ($validator->fails()) {
		    // send back to the page with the input data and errors
		    return Redirect::routes('upload')->withInput()->withErrors($validator);
		  }
		  else {
		    // checking file is valid.
		    if (Input::file('file')->isValid()) {
		      $destinationPath = public_path().'/photos'; // upload path
		      $extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
		      $fileName = rand(11111,99999).'.'.$extension; // renameing image
		      Input::file('file')->move($destinationPath, $fileName); // uploading file to given path
		      // sending back with message
		      Session::flash('success', 'Upload successfully'); 
		      return "sukses";
		      // return Redirect::to('upload');
		    }
		    else {
		      // sending back with error message.
		      Session::flash('error', 'uploaded file is not valid');
		      return "gagal";
		      // return Redirect::to('upload');
		    }
		  }
		return Input::all();
	}

}
