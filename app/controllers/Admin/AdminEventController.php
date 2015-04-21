<?php

class AdminEventController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Event Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	public function index()
	{
		// init
		$data = array(
			'menu' => 'event',
			'title' => 'Event',
			'description' => '',
			'breadcrumb' => array(
				'Event' => route('admin.event'),
			),
		);

		return View::make('admin.pages.event.index')
					->with($data);
	}

	
}