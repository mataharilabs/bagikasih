<?php

class AdminCityController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| City Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	public function index()
	{
		// init
		$data = array(
			'menu' => 'master',
			'title' => 'Kota',
			'description' => '',
			'breadcrumb' => array(
				'Kota' => route('admin.city'),
			),
		);

		return View::make('admin.pages.city.index')
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