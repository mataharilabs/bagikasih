<?php

class AdminCountryController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Country Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/
	private $_menu = 'master';

	public function index()
	{
		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Negara',
			'description' => '',
			'breadcrumb' => array(
				'Negara' => route('admin.country'),
			),
		);

		// Set countries
		$data['countries'] = Country::all();

		return View::make('admin.pages.country.index')
					->with($data);
	}

	public function show($id)
	{
		// get country
		$country = Country::find($id);

		if ($country == null) return App::abort('404');

		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Negara - ' . $country->name,
			'description' => '',
			'breadcrumb' => array(
				'Negara' => route('admin.country'),
				$country->name => route('admin.country.show', $country->id),
			),
		);

		// Set country
		$data['country'] = $country;

		return View::make('admin.pages.country.show')
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