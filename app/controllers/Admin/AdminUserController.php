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