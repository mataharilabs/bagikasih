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
		$data = array();
		$limit = 8;

		// get all categories
		$data['categories'] = SocialTargetCategory::where('status', '=', 1)->get();

		// get all cities
		$data['cities'] = City::where('status', '=', 1)->orderBy('name', 'asc')->get();

		// get input
		$input = Input::all();

		// set input
		$data['input'] = $input;

		// get social targets
		$social_targets = SocialTarget::with(array('city', 'category'));

		if (Input::has('q'))
		{
			// keyword
			$social_targets = $social_targets->where(function($query) use($input) {
									$query->where('name', 'like', '%'.$input['q'].'%')
												->orWhere('slug', 'like', '%'. $input['q'] .'%');
								});
		}

		if (Input::has('category'))
		{
			// category
			$social_targets = $social_targets->where('social_target_category_id', '=', $input['city']);
		}
							
		if (Input::has('city'))
		{
			// city
			$social_targets = $social_targets->where('city_id', '=', $input['city']);
		}

		$data['social_targets'] = $social_targets->orderBy('id', 'desc')->take($limit)->get();

		return View::make('bagikasih.social-target.index', $data);
	}

	public function show($id)
	{
		echo $id;
	}

	public function create()
	{
		echo 'create';
	}

}
