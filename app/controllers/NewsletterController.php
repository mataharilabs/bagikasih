<?php

class NewsletterController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Newsletter Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	public function index()
	{
		
	}

	public function show($id)
	{
		// init
		$data = array();

		$newsletter = Newsletter::getByNID($id);

		if ($newsletter == null) return App::abort('404');
		
		return View::make('bagikasih.event.detail', $data);
	}

}
