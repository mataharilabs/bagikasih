<?php

class AdminReportController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Report Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	public function index()
	{
		// init
		$data = array(
			'menu' => 'report',
			'title' => 'Laporan',
			'description' => '',
			'breadcrumb' => array(
				'Laporan' => route('admin.report'),
			),
		);

		return View::make('admin.pages.report.index')
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