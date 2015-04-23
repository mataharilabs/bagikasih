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

		$data['report'] = Report::with(array('user','event','socialaction','socialtarget'))->get();

		return View::make('admin.pages.report.index')
					->with($data);
	}

	public function show($id)
	{
		$data = array(
			'menu' => 'report',
			'title' => 'Laporan',
			'description' => '',
			'breadcrumb' => array(
				'Laporan' => route('admin.report'),
			),
		);

		$data['report'] = Report::with(array('user','event','socialaction','socialtarget'))->where('id',$id)->first();

		// return $data;
		return View::make('admin.pages.report.show')
					->with($data);

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