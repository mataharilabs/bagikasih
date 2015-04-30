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
			'title' => 'SocialTargetCategory+',
			'description' 	=> '',
			'breadcrumb' 	=> array(
				'Social Target Category' 	=> route('admin.social-target-category')			
			),		
		);

		return View::make('admin.pages.social-target-category.create', $data);
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
			$social_target_category 		= SocialTargetCategory::add($input);			
			if($social_target_category)
			{			
				return Redirect::route('admin.social-target-category')->withStatuses(['add'=>'Tambah Berhasil!']);
			}	
			return Redirect::route('admin.social-target-category.create')->withErrors(['add'=>'Tambah Gagal!'])->withInput();
		}
		return Redirect::route('admin.social-target-category.create')->withErrors($validator)->withInput();
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

	public function update(SocialTargetCategory $social_target_category)
	{		
		$data 		= array(
			'menu' 				=> $this->_menu,
			'title' 			=> 'SocialTargetCategory+',
			'description' 		=> '',
			'breadcrumb' 		=> array(
				'Negara' 		=> route('admin.social-target-category')			
			),			
			'data' 				=> $social_target_category,
		);

		return View::make('admin.pages.social-target-category.edit', $data);
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
			
			$save  = SocialTargetCategory::edit($input);			
			if($save)
			{
				return Redirect::route('admin.social-target-category')->withStatuses(['edit'=> 'Data Berhasil di edit!']);
			}
			return Redirect::route('admin.social-target-category')->withErrors(['edit'=> 'Data Gagal di edit!']);
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

	public function delete(SocialTargetCategory $social_target_category)
	{
		$data = array(
			'menu' 	=> $this->_menu,
			'title' => 'SocialTargetCategory+',
			'description' => '',
			'breadcrumb' => array(
				'Negara' => route('admin.social-target-category')			
			),
			'data' 	=> $social_target_category
		);
		return View::make('admin.pages.social-target-category.delete', $data);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function deleteDo()
	{	
		$social_target_category = SocialTargetCategory::remove(Input::get('id'));
		if($social_target_category)
		{
			return Redirect::route('admin.social-target-category')->withStatuses(['delete' => 'Hapus Sukses!']);
		}
		return Redirect::route('admin.social-target-category')->withErrors(['delete' => 'Hapus Gagal!']);
	}
}