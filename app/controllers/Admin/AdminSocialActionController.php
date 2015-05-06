<?php

class AdminSocialActionController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Social Action Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	
	private $_menu = 'social-action';

	public function index()
	{
		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Aksi Sosial',
			'description' => '',
			'breadcrumb' => array(
				'Aksi Sosial' => route('admin.social-action'),
			),
		);

		// Set social target
		$data['social_action'] = SocialAction::with(array('city', 'category', 'user'))->get();

		// return $data['social_action'];

		return View::make('admin.pages.social-action.index')
					->with($data);
	}

	public function show($id)
	{
		// get social target
		$social_action =SocialAction::with(array('city', 'category', 'user'))
										->where('id', '=', $id)
										->orderBy('id', 'desc')
										->first();

		if ($social_action == null) return App::abort('404');

		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Target Sosial - ' . $social_action->name,
			'description' => '',
			'breadcrumb' => array(
				'Kategori Aksi Social' => route('admin.social-action'),
				$social_action->name => route('admin.social-action.show', $social_action->id),
			),
		);

		// Get category
		$data['social_actions'] = $social_action;


		// Get Donations that related with this
		$data['donations'] = Donation::with(array('user'))
										->where('type_name', '=', 'social_actions')
										->where('type_id', '=', $social_action->id)
										->orderBy('id', 'desc')
										->get();

		// Get Photos that related with this
		$data['photos'] = Photo::where('type_name', '=', 'social_actions')
										->where('type_id', '=', $social_action->id)
										->orderBy('id', 'desc')
										->get();

		return View::make('admin.pages.social-action.show')
					->with($data);
	}

	public function create()
	{
		$data = array(
			'menu' => 'Aksi Sosial',
			'title' => 'Aksi Sosial',
			'description' => '',
			'breadcrumb' => array(
				'Kategori Aksi Social' => route('admin.social-action')
				// $social_action->name => route('admin.social-action.show', $social_action->id),
			),
		);

		$data['social_target'] = SocialTarget::all();
		$data['social_action_category'] = SocialActionCategory::all();
		$data['user'] = User::all();
		$data['city'] = City::all();

		$input =  array(
			'name'=> Input::get('name'),
			'description'=> Input::get('description'),
			'stewardship'=> Input::get('stewardship'),
			'bank_account_description'=> Input::get('bank_account_description'),
			'currency'=> Input::get('currency'),
			'total_donation_target'=> Input::get('total_donation'),
			'total_donation'=> Input::get('total_donation'),
			'expired_at'=> Input::get('expired_at'),
		 );

		
		return $postSocialAction = SocialAction::StoreSocialAction($input);

		return View::make('admin.pages.social-action.create')->with($data);

	}

	public function update($id)
	{
		
	}

	public function delete($id)
	{
		
		return $id;

	}
}