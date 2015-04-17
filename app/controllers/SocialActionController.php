<?php

class SocialActionController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Social Action Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	public function index()
	{
		// init
		$data 	= array();

		// set offset & limit
		$limit 	= 8;
		$page 	= (Input::has('page')) ? Input::get('page') : 1;
		$offset = ($page - 1) * $limit;

		// get all categories
		$data['categories'] = SocialActionCategory::where('status', '=', 1)->get();

		// get all cities
		$data['cities'] = City::where('status', '=', 1)->orderBy('name', 'asc')->get();

		// get input
		$input = Input::all();
		
		// get social actions
		$social_actions = SocialAction::with(array('city', 'category'));

		if (Input::has('q'))
		{
			// keyword
			$input['q'] = trim($input['q']);
			$social_actions = $social_actions->where('name', 'like', '%'.$input['q'].'%');
		}

		if (Input::has('category') and Input::get('category') != 'all')
		{
			// category
			$social_actions = $social_actions->where('social_action_category_id', '=', $input['category']);
		}
							
		if (Input::has('city') and Input::get('city') != 'all')
		{
			// city
			$social_actions = $social_actions->where('city_id', '=', $input['city']);
		}

		$data['social_actions'] = $social_actions->orderBy('id', 'desc')->paginate($limit);

		// set input
		$data['input'] = $input;

		return View::make('bagikasih.social-action.index', $data);
	}

	public function show($id)
	{
		$data = array();

		$social_actions = SocialAction::getById($id);

		if ($social_actions == false) return App::abort('404');

		$photos = Photo::where('type_name', '=', 'social_actions')
						->where('type_id', '=', $social_actions[0]['id'])
						->where('status', '=', 1)
						->get();

		$donations = Donation::with(array('user'))
							->where('type_name', '=', 'social_actions')
							->where('status', '=', 1)
							->orderBy('id', 'desc')
							->get();
		
		$user = User::getUserId($social_actions['user_id']);
		
		$social_target = SocialTarget::getById($social_actions['social_target_id']);

		$data = array(
			'social_action' => $social_actions,
			'photos'	=> $photos,
			'donations'	=> $donations,
			'user'	=> $user,
			'social_target'	=> $social_target,
		);
		
		return View::make('bagikasih.social-action.detail', $data);	

	}

	// input data 
	public function create($id) {
		  
		$data = array();

		$social_actions = SocialAction::getById($id);

		if ($social_actions == false) return App::abort('404');

		$user = User::getUserId($social_actions['user_id']);
		
		$social_target = SocialTarget::getById($social_actions['social_target_id']);

		// $social_action_category_id = SocialActionCategory::getAll();
		
		$upload_gambar = Photo::recordImage();

		$input =  array(
						'social_target_id'=> Auth::user('id'),
						'social_action_category_id'=> Auth::user('id'),
						'user_id'=> Auth::user('id'),
						'city_id' => (int) Input::get('city_id'),
						'default_photo_id'=> is_numeric($upload_gambar) ? $upload_gambar : 'NULL',
						'cover_photo_id' => (int) Input::get('cover_photo_id'),
						'description' => Input::get('description'),
						'stewardship' => Input::get('stewardship'),
						'bank_account_description' => Input::get('bank_account_description'),
						'slug' => Input::get('slug'),
						'currency' => Input::get('currency'),
						'total_donation_target' => Input::get('total_donation_target'),
						'total_donation' => Input::get('total_donation'),
						'expired_at' => Input::get('expired_at'),
						'status' => Input::get('status'),
		); 
		
		// return SocialAction::createSocialAction(Input::all());
	}

}
