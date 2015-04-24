<?php

class AdminDashboardController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Dashboard Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	private $_menu = 'dashboard';

	public function index()
	{
		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Dashboard',
			'description' => '',
			'breadcrumb' => array(
				'Dashboard' => '/',
			),
		);

		// New payment that need confirmation
		$data['payments'] = Payment::with(array('user', 'donations'))->where('status', '=', 0)->get();

		// New social target that need confirmation
		$data['social_targets'] = SocialTarget::with(array('city', 'category', 'user'))
											->where('status', '=', 0)
											->get();

		// New action action that need confirmation
		$data['social_actions'] = SocialAction::with(array('city', 'category', 'user'))
												->where('status', '=', 0)
												->get();

		// New event that need confirmation
		$data['events'] = Events::with(array('city', 'category', 'user'))
												->where('status', '=', 0)
												->get();

		// New report that need confirmation
		$reports = Report::with(array('user'))->where('have_responded', '=', 0)->get();

		foreach ($reports as $report)
		{
			$report->setAppends(array('type'));
		}

		$data['reports'] = $reports;

		// return $data;

		return View::make('admin.pages.dashboard')
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