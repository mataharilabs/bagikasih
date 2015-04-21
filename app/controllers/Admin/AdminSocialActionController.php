<?php

class AdminSocialActionController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Social Action Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	public function index()
	{
		// init
		$data = array(
			'menu' => 'social-action',
			'title' => 'Aksi Sosial',
			'description' => '',
			'breadcrumb' => array(
				'Aksi Sosial' => route('admin.social-action'),
			),
		);

		return View::make('admin.pages.social-action.index')
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