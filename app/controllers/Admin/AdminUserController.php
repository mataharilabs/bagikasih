<?php

class AdminUserController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| User Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	public function index()
	{
		// init
		$data = array(
			'menu' => 'user',
			'title' => 'User',
			'description' => '',
			'breadcrumb' => array(
				'User' => route('admin.user'),
			),
		);

		return View::make('admin.pages.user.index')
					->with($data);
	}

	public function show($id)
	{
		
	}

	public function create()
	{
		
	}

	public function update($id)
	{
		
	}

	public function delete($id)
	{
		
	}
}