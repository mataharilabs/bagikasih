<?php

class AdminSocialActionCategoryController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Social Action Category Controller
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
			'title' => 'Kategori Aksi Sosial',
			'description' => '',
			'breadcrumb' => array(
				'Kategori Aksi Sosial' => route('admin.social-action-category'),
			),
		);

		return View::make('admin.pages.social-action-category.index')
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