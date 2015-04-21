<?php

class AdminEventCategoryController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Event Category Controller
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
			'title' => 'Kategori Event',
			'description' => '',
			'breadcrumb' => array(
				'Kategori Event' => route('admin.event-category'),
			),
		);

		return View::make('admin.pages.event-category.index')
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