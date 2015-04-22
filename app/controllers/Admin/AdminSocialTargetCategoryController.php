<?php

class AdminSocialTargetCategoryController extends AdminBaseController {

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
			'title' => 'Kategori Target Sosial',
			'description' => '',
			'breadcrumb' => array(
				'Kategori Target Sosial' => route('admin.social-target-category'),
			),
		);

		// Set categories
		$data['categories'] = SocialTargetCategory::all();

		return View::make('admin.pages.social-target-category.index')
					->with($data);
	}

	public function show($id)
	{
		// get category
		$category = SocialTargetCategory::find($id);

		if ($category == null) return App::abort('404');

		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Kategori Target Sosial - ' . $category->name,
			'description' => '',
			'breadcrumb' => array(
				'Kategori Target Sosial' => route('admin.social-target-category'),
				$category->name => route('admin.social-target-category.show', $category->id),
			),
		);

		// Set category
		$data['category'] = $category;

		return View::make('admin.pages.social-target-category.show')
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