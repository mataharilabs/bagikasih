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
		// echo $id;

		$data = array();

		$data['view'] = SocialAction::getById($id);

		if ($data['view'] == false) return App::abort('404');

		$data['photos'] = Photo::where('type_name', '=', 'social_actions')
						->where('type_id', '=', $data['view'][0]['id'])
						->where('status', '=', 1)
						->get();

		$data['donations'] = Donation::with(array('user'))
							->where('type_name', '=', 'social_actions')
							->where('status', '=', 1)
							->orderBy('id', 'desc')
							->get();
		return $data;	

	}

	public function create()
	{
		echo 'create';
	}

}
