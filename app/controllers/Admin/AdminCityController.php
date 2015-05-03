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

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function create()
	{
		$country = Country::optionsCountry();
		$data = array(
			'menu' 	=> $this->_menu,
			'title' => 'Negara+',
			'description' => '',
			'breadcrumb' => array(
				'Negara' => route('admin.city')			
			),
			'options_country'	=> $country,
		);

		return View::make('admin.pages.city.create', $data);
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
			$city 		= City::add($input);			
			if($city)
			{			
				return Redirect::route('admin.city')->withStatuses(['add'=>'Tambah Berhasil!']);
			}	
			return Redirect::route('admin.city')->withErrors(['add'=>'Tambah Gagal!']);
		}
		return Redirect::route('admin.city.create')->withErrors($validator)->withInput();
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
				'country_id'=> Input::get('country'),
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
		return Validator::make(Input::all(), ['name'=> 'required','country' =>'required', 'status'=> 'required']);
	}

	public function update(City $city)
	{
		$country 	= Country::optionsCountry();
		$data 		= array(
			'menu' 				=> $this->_menu,
			'title' 			=> 'Negara+',
			'description' 		=> '',
			'breadcrumb' 		=> array(
				'Negara' 		=> route('admin.city')			
			),
			'options_country' 	=> $country,
			'city' 				=> $city,
		);

		return View::make('admin.pages.city.edit', $data);
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
			
			$save  = City::edit($input);			
			if($save)
			{
				return Redirect::route('admin.city')->withStatuses(['edit'=> 'Data Berhasil di edit!']);
			}
			return Redirect::route('admin.city')->withErrors(['edit'=> 'Data Gagal di edit!']);
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
				'country_id'=> Input::get('country'), 
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
								'country'	=> 'required',
								'status'	=> 'required']);
	}

	public function delete(City $city)
	{
		$data = array(
			'menu' 	=> $this->_menu,
			'title' => 'Negara+',
			'description' => '',
			'breadcrumb' => array(
				'Negara' => route('admin.city')			
			),
			'city' 	=> $city
		);
		return View::make('admin.pages.city.delete', $data);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function deleteDo()
	{	
		$id 	 	= Input::get('id');
		$validator 	= $this->deleteValid($id);
		if($validator)
		{		
			$city = City::remove($id);
			if($city)
			{
				return Redirect::route('admin.city')->withStatuses(['delete' => 'Hapus Sukses!']);
			}
			return Redirect::route('admin.city')->withErrors(['delete' => 'Hapus Gagal!']);
		}
		return Redirect::route('admin.city')->withErrors(['used'=> 'Maaf, data ini masih digunakan! Hapus Gagal.']);
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function deleteValid($id)
	{
		$exist =  City::isExist($id);
		if($exist)
		{
			return false;
		}
		return true;
	}
}