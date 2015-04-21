<?php

class AdminCountryController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Country Controller
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
			'title' => 'Negara',
			'description' => '',
			'breadcrumb' => array(
				'Negara' => route('admin.country'),
			),
		);

		return View::make('admin.pages.country.index')
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