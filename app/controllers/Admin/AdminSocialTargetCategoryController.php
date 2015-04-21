<?php

class AdminSocialTargetCategoryController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Social Target Category Controller
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
			'title' => 'Kategori Target Sosial',
			'description' => '',
			'breadcrumb' => array(
				'Kategori Target Sosial' => route('admin.social-target-category'),
			),
		);

		return View::make('admin.pages.social-target-category.index')
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