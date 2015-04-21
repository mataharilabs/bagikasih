<?php

class AdminSettingController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Setting Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	public function index()
	{
		// init
		$data = array(
			'menu' => 'setting',
			'title' => 'Pengaturan',
			'description' => '',
			'breadcrumb' => array(
				'Pengaturan' => route('admin.setting'),
			),
		);

		return View::make('admin.pages.setting.index')
					->with($data);
	}

	
}