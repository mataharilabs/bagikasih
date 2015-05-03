<?php

class AdminUserController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| User Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	private $_menu = 'Pengguna Bagikasih';

	public function index()
	{
		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Pengguna',
			'description' => '',
			'breadcrumb' => array(
				'Pengguna Bagikasih' => route('admin.user'),
			),
		);

		// Set social target
		$data['users'] = User::get();

		return View::make('admin.pages.user.index')
					->with($data);
	}

	public function show($id)
	{
		// get social target
		$user = User::with('city')->find($id);

		if ($user == null) return App::abort('404');

		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Nama pengguna - ' . $user->firstname.' '.$user->lastname,
			'description' => '',
			'breadcrumb' => array(
				'Pengguna Bagikasih' => route('admin.user'),
				$user->firstname => route('admin.user.show', $user->id),
			),
		);


		$data['users'] = $user;

		$social_target = SocialTarget::with(array('city', 'category', 'user'))
						->where('user_id',$user->id)->get();

		// Get Social Target
		$data['social_target'] = $social_target;

		// Get Social Actions that related with this
		$data['social_actions'] = SocialAction::with(array('city', 'category', 'user'))
										->where('user_id', '=', $user->id)
										->orderBy('id', 'desc')
										->get();

		// Get Donations that related with this
		$data['donations'] = Donation::with(array('user'))
										->where('type_name', '=', 'users')
										->where('type_id', '=', $user->id)
										->orderBy('id', 'desc')
										->get();

		// Get Photos that related with this
		$data['photos'] = Photo::where('type_name', '=', 'users')
										->where('type_id', '=', $user->id)
										->orderBy('id', 'desc')
										->get();

		return View::make('admin.pages.user.show')
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
		$city = User::optionsCity();	
		$data = array(
			'menu' 	=> $this->_menu,
			'title' => 'User+',
			'description' 	=> '',
			'breadcrumb' 	=> array(
				'Social Target Category' 	=> route('admin.user')			
			),
			'options'		=> $city,	
		);

		return View::make('admin.pages.user.create', $data);
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
			$user 		= User::add($input);			
			if($user)
			{			
				return Redirect::route('admin.user')->withStatuses(['add'=>'Tambah Berhasil!']);
			}	
			return Redirect::route('admin.user.create')->withErrors(['add'=>'Tambah Gagal!'])->withInput();
		}
		return Redirect::route('admin.user.create')->withErrors($validator)->withInput();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function storeInput()
	{
		return [
				'city_id'			=> 	Input::get('city'),
				'firstname'			=>  Input::get('firstname'), 
				'lastname'			=>  Input::get('lastname'),
				'email'				=>  Input::get('email'),
				'description'		=>  Input::get('description'),
				'password'			=>  Input::get('password'),				
				'phone_number' 		=> 	Input::get('phone'),
				'slug'				=>  Input::get('slug'),					
				'is_celebrity'		=>  Input::get('celebrity'),
				'is_my_social_target_subscriber' 	=>  Input::get('social_target'),
				'is_my_social_action_subscriber' 	=>  Input::get('social_action'),
				'is_newsletter_subscriber' 			=>  Input::get('newsletter_subscriber'),
				'status'			=>  Input::get('status'),
				'role'				=>  Input::get('role'),
			];			
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function storeValid()
	{
		return Validator::make(Input::all(), 
			[	
				'city'				=> 'required',
				'firstname'			=> 'required', 
				'lastname'			=> 'required',
				'email'				=> 'required|email',
				'description'		=> 'required',
				'password'			=> 'required|same:password_confirm',
				'password_confirm'	=> 'required|same:password',				
				'phone' 			=> 'required',
				'slug'				=> 'required',	
				'birthday'			=> 'required',
				'celebrity'			=> 'required',
				'social_target' 	=> 'required',
				'social_action' 	=> 'required',
				'newsletter_subscriber' => 'required',
				'status'			=> 'required',
				'role'				=> 'required',
			]);
	}

	public function update(User $user)
	{	
		$city = User::optionsCity();		
		$data 		= array(
			'menu' 				=> $this->_menu,
			'title' 			=> 'User+',
			'description' 		=> '',
			'breadcrumb' 		=> array(
				'Negara' 		=> route('admin.user')			
			),			
			'data' 				=> $user,
			'options'			=> $city,
		);

		return View::make('admin.pages.user.edit', $data);
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
			
			$save  = User::edit($input);			
			if($save)
			{
				return Redirect::route('admin.user')->withStatuses(['edit'=> 'Data Berhasil di edit!']);
			}
			return Redirect::route('admin.user')->withErrors(['edit'=> 'Data Gagal di edit!']);
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
		return [
				'id'				=> 	Input::get('id'),
				'city_id'			=> 	Input::get('city'),
				'firstname'			=>  Input::get('firstname'), 
				'lastname'			=>  Input::get('lastname'),
				'email'				=>  Input::get('email'),
				'description'		=>  Input::get('description'),
				'password'			=>  Input::get('password'),				
				'phone_number' 		=> 	Input::get('phone'),
				'slug'				=>  Input::get('slug'),					
				'is_celebrity'		=>  Input::get('celebrity'),
				'is_my_social_target_subscriber' 	=>  Input::get('social_target'),
				'is_my_social_action_subscriber' 	=>  Input::get('social_action'),
				'is_newsletter_subscriber' 			=>  Input::get('newsletter_subscriber'),
				'status'			=>  Input::get('status'),
				'role'				=>  Input::get('role'),
			];
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function updateValid()
	{
		
		return Validator::make(Input::all(), 
			[	'id'				=> 'required',
				'city'				=> 'required',
				'firstname'			=> 'required', 
				'lastname'			=> 'required',
				'email'				=> 'required|email',
				'description'		=> 'required',				
				'phone' 			=> 'required',
				'slug'				=> 'required',	
				'birthday'			=> 'required',
				'celebrity'			=> 'required',
				'social_target' 	=> 'required',
				'social_action' 	=> 'required',
				'newsletter_subscriber' => 'required',
				'status'			=> 'required',
				'role'				=> 'required',
			]);
	}

	public function delete(User $user)
	{
		$data = array(
			'menu' 	=> $this->_menu,
			'title' => 'User+',
			'description' => '',
			'breadcrumb' => array(
				'Negara' => route('admin.user')			
			),
			'data' 	=> $user
		);
		return View::make('admin.pages.user.delete', $data);
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
			$user = User::remove(Input::get('id'));
			if($user)
			{
				return Redirect::route('admin.user')->withStatuses(['delete' => 'Hapus Sukses!']);
			}
			return Redirect::route('admin.user')->withErrors(['delete' => 'Hapus Gagal!']);
		}
		return Redirect::route('admin.user')->withErrors(['used'=> 'Maaf, data ini masih digunakan! Hapus Gagal.']);
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