<?php

class AdminCityController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| City Controller
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
			'title' => 'Kota',
			'description' => '',
			'breadcrumb' => array(
				'Kota' => route('admin.city'),
			),
		);

		// Set countries
		$data['cities'] = City::with('country')->get();

		return View::make('admin.pages.city.index')
					->with($data);
	}

	public function show($id)
	{
		// get city
		$city = City::with('country')->find($id);

		if ($city == null) return App::abort('404');

		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Kota - ' . $city->name,
			'description' => '',
			'breadcrumb' => array(
				'Kota' => route('admin.city'),
				$city->name => route('admin.city.show', $city->id),
			),
		);

		// Set city
		$data['city'] = $city;

		return View::make('admin.pages.city.show')
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