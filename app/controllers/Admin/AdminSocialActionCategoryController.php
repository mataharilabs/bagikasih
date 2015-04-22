<?php

class AdminSocialActionCategoryController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Social Action Category Controller
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
			'title' => 'Kategori Aksi Sosial',
			'description' => '',
			'breadcrumb' => array(
				'Kategori Aksi Sosial' => route('admin.social-action-category'),
			),
		);

		// Set categories
		$data['categories'] = SocialActionCategory::all();

		return View::make('admin.pages.social-action-category.index')
					->with($data);
	}

	public function show($id)
	{
		// get category
		$category = SocialActionCategory::find($id);

		if ($category == null) return App::abort('404');

		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Kategori Aksi Sosial - ' . $category->name,
			'description' => '',
			'breadcrumb' => array(
				'Kategori Aksi Sosial' => route('admin.social-action-category'),
				$category->name => route('admin.social-action-category.show', $category->id),
			),
		);

		// Set category
		$data['category'] = $category;

		return View::make('admin.pages.social-action-category.show')
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