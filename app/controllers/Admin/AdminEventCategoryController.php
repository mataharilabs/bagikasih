<?php

class AdminEventCategoryController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Social Target Category Controller
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
			'title' => 'Kategori Event',
			'description' => '',
			'breadcrumb' => array(
				'Kategori Event' => route('admin.event-category'),
			),
		);

		// Set categories
		$data['categories'] = EventCategory::all();

		return View::make('admin.pages.event-category.index')
					->with($data);
	}

	public function show($id)
	{
		// get category
		$category = EventCategory::find($id);

		if ($category == null) return App::abort('404');

		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Kategori Event - ' . $category->name,
			'description' => '',
			'breadcrumb' => array(
				'Kategori Event' => route('admin.event-category'),
				$category->name => route('admin.event-category.show', $category->id),
			),
		);

		// Set category
		$data['category'] = $category;

		return View::make('admin.pages.event-category.show')
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