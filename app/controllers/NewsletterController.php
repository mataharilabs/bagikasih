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

		$data = array('content' => $newsletter->message);
		
		return View::make('emails.blank', $data);
	}

}
