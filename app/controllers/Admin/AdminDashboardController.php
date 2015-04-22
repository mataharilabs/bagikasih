<?php

class AdminDashboardController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Dashboard Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	public function index()
	{
		// init
		$data = array(
			'menu' => 'dashboard',
			'title' => 'Dashboard',
			'description' => '',
			'breadcrumb' => array(
				'Dashboard' => '/',
			),
		);

		return View::make('admin.pages.dashboard')
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