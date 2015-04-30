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

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function create()
	{		
		$data = array(
			'menu' 	=> $this->_menu,
			'title' => 'SocialActionCategory+',
			'description' 	=> '',
			'breadcrumb' 	=> array(
				'Social Target Category' 	=> route('admin.social-action-category')			
			),		
		);

		return View::make('admin.pages.social-action-category.create', $data);
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function store()
	{		
		$validator = $this->storeValid();
		if($validator->passes())
		{		
			$input 		= $this->storeInput();
			$social_action_category 		= SocialActionCategory::add($input);			
			if($social_action_category)
			{			
				return Redirect::route('admin.social-action-category')->withStatuses(['add'=>'Tambah Berhasil!']);
			}	
			return Redirect::route('admin.social-action-category.create')->withErrors(['add'=>'Tambah Gagal!'])->withInput();
		}
		return Redirect::route('admin.social-action-category.create')->withErrors($validator)->withInput();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function storeInput()
	{
		return ['name'		=> Input::get('name'), 				
				'status' 	=> Input::get('status')];				
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function storeValid()
	{
		return Validator::make(Input::all(), ['name'=> 'required', 'status'=> 'required']);
	}

	public function update(SocialActionCategory $social_action_category)
	{		
		$data 		= array(
			'menu' 				=> $this->_menu,
			'title' 			=> 'SocialActionCategory+',
			'description' 		=> '',
			'breadcrumb' 		=> array(
				'Negara' 		=> route('admin.social-action-category')			
			),			
			'data' 				=> $social_action_category,
		);

		return View::make('admin.pages.social-action-category.edit', $data);
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function updateDo()
	{
		$validator = $this->updateValid();
		if($validator->passes())
		{
			$input = $this->updateInput();
			
			$save  = SocialActionCategory::edit($input);			
			if($save)
			{
				return Redirect::route('admin.social-action-category')->withStatuses(['edit'=> 'Data Berhasil di edit!']);
			}
			return Redirect::route('admin.social-action-category')->withErrors(['edit'=> 'Data Gagal di edit!']);
		}
		return Redirect::back()->withErrors($validator)->withInput();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function updateInput()
	{
		return ['id'		=> Input::get('id'), 
				'name'		=> Input::get('name'),				
				'status'	=> Input::get('status')];
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function updateValid()
	{
		return Validator::make(Input::all(), [
								'id'		=> 'required', 
								'name'		=> 'required', 								
								'status'	=> 'required']);
	}

	public function delete(SocialActionCategory $social_action_category)
	{
		$data = array(
			'menu' 	=> $this->_menu,
			'title' => 'SocialActionCategory+',
			'description' => '',
			'breadcrumb' => array(
				'Negara' => route('admin.social-action-category')			
			),
			'data' 	=> $social_action_category
		);
		return View::make('admin.pages.social-action-category.delete', $data);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function deleteDo()
	{	
		$social_action_category = SocialActionCategory::remove(Input::get('id'));
		if($social_action_category)
		{
			return Redirect::route('admin.social-action-category')->withStatuses(['delete' => 'Hapus Sukses!']);
		}
		return Redirect::route('admin.social-action-category')->withErrors(['delete' => 'Hapus Gagal!']);
	}
}