<?php

class AdminSocialTargetController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Social Target Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	public function index()
	{
		// init
		$data = array(
			'menu' => 'social-target',
			'title' => 'Target Sosial',
			'description' => '',
			'breadcrumb' => array(
				'Target Sosial' => route('admin.social-target'),
			),
		);

		return View::make('admin.pages.social-target.index')
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