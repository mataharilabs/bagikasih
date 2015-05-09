<?php

class SocialTargetController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Social Target Controller
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
		$data['categories'] = SocialTargetCategory::where('status', '=', 1)->get();

		// get all cities
		$data['cities'] = City::where('status', '=', 1)->orderBy('name', 'asc')->get();

		// get input
		$input = Input::all();
		
		// get social targets
		$social_targets = SocialTarget::with(array('city', 'category'))->where('status', '!=', 0);

		if (Input::has('q'))
		{
			// keyword
			$input['q'] = trim($input['q']);
			$social_targets = $social_targets->where('name', 'like', '%'.$input['q'].'%');
		}

		if (Input::has('category') and Input::get('category') != 'all')
		{
			// category
			$social_targets = $social_targets->where('social_target_category_id', '=', $input['category']);
		}
							
		if (Input::has('city') and Input::get('city') != 'all')
		{
			// city
			$social_targets = $social_targets->where('city_id', '=', $input['city']);
		}

		$data['social_targets'] = $social_targets->orderBy('id', 'desc')->paginate($limit);

		// set input
		$data['input'] = $input;

		return View::make('bagikasih.social-target.index', $data);
	}

	public function show($id)
	{
		// init
		$data = array();

		// get social target data - with slug
		$social_target = SocialTarget::with(array('city', 'category'))->where('slug', '=', $id)->where('status', '=', 1)->first();

		if ($social_target == null) return App::abort('404');

		// get photos
		$photos = Photo::where('type_name', '=', 'social_targets')
						->where('type_id', '=', $social_target->id)
						->where('status', '=', 1)
						->get();

		// get social actions
		$social_actions = SocialAction::with(array('city', 'category'))
							->where('social_target_id', '=', $social_target->id)
							->where('status', '=', 1)
							->orderBy('id', 'desc')
							->get();

		// set data
		$data = array(
			'social_target' 	=> $social_target,
			'photos'			=> $photos,
			'social_actions'	=> $social_actions,
		);


		$data['social_target_id'] = SocialTarget::getAll();

		$data['social_action_category_id'] = SocialActionCategory::getAll();

		$data['city_id'] = City::getAll();
		
		// return $data;
		
		return View::make('bagikasih.social-target.detail', $data);
	}

	public function create()
	{
		// init
		$data = array();

		if (Session::has('update_id') and Auth::check())
		{
			$updated = SocialTarget::updateUserid(Session::get('update_id'));
			
			if ($updated)
			{
				// show success alert
				$data['success'] = true;

				// unset session
				Session::forget('update_id');
			}
		}
		else if (Session::has('success'))
		{
			$data['success'] = true;
		}

		// get categories
		$data['categories'] = SocialTargetCategory::where('status', '=', 1)->get();
		
		// get all cities
		$data['cities'] = City::where('status', '=', 1)->orderBy('name', 'asc')->get();

		return View::make('bagikasih.social-target.create',$data);
	}

	public function create_post()
	{
		$response = SocialTarget::add(Input::all());

		if ($response['success'])
		{
			Session::flash('success', true);

			return Response::json(['success' => true, 'redirect_url' => URL::route('buat-target-sosial')]);
		}
		else if (isset($response['errors']))
		{
			return Response::json(['success' => false, 'errors' => $response['errors']]);
		}
		else
		{
			return Response::json(['success' => false]);
		}
	}

	

}
