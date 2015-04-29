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
			'title' => 'Negara+',
			'description' => '',
			'breadcrumb' => array(
				'Negara' => route('admin.country')			
			),
		);

		return View::make('admin.pages.country.create', $data);
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
			$country 	= Country::add($input);			
			if($country)
			{			
				return Redirect::route('admin.country')->withStatuses(['add'=>'Tambah Berhasil!']);
			}	
			return Redirect::route('admin.country')->withErrors(['add'=>'Tambah Gagal!']);
		}
		return Redirect::route('admin.country.create')->withErrors($validator);
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

	public function update(Country $country)
	{
		$data = array(
			'menu' 	=> $this->_menu,
			'title' => 'Negara+',
			'description' => '',
			'breadcrumb' => array(
				'Negara' => route('admin.country')			
			),
			'country' 	=> $country
		);
		return View::make('admin.pages.country.edit', $data);
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
			
			$save  = Country::edit($input);			
			if($save)
			{
				return Redirect::route('admin.country')->withStatuses(['edit'=> 'Data Berhasil di edit!']);
			}
			return Redirect::route('admin.country')->withErrors(['edit'=> 'Data Gagal di edit!']);
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
		return ['id'=> Input::get('id'), 'name'=> Input::get('name'), 'status'=> Input::get('status')];
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function updateValid()
	{
		return Validator::make(Input::all(), ['id'=> 'required', 'name'=> 'required', 'status'=> 'required']);
	}

	public function delete(Country $country)
	{
		$data = array(
			'menu' 	=> $this->_menu,
			'title' => 'Negara+',
			'description' => '',
			'breadcrumb' => array(
				'Negara' => route('admin.country')			
			),
			'country' 	=> $country
		);
		return View::make('admin.pages.country.delete', $data);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function deleteDo()
	{	
		$country = Country::remove(Input::get('id'));
		if($country)
		{
			return Redirect::route('admin.country')->withStatuses(['delete' => 'Hapus Sukses!']);
		}
		return Redirect::route('admin.country')->withErrors(['delete' => 'Hapus Gagal!']);
	}
}