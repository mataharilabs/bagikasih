<?php

class EventController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Event Controller
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
		$data['categories'] = EventCategory::where('status', '=', 1)->get();

		// get all cities
		$data['cities'] = City::where('status', '=', 1)->orderBy('name', 'asc')->get();

		// get input
		$input = Input::all();
		
		// get social actions
		$events = Events::with(array('city', 'category'));

		if (Input::has('q'))
		{
			// keyword
			$input['q'] = trim($input['q']);
			$events = $events->where('name', 'like', '%'.$input['q'].'%');
		}

		if (Input::has('category') and Input::get('category') != 'all')
		{
			// category
			$events = $events->where('event_category_id', '=', $input['category']);
		}
							
		if (Input::has('city') and Input::get('city') != 'all')
		{
			// city
			$events = $events->where('city_id', '=', $input['city']);
		}

		$data['events'] = $events->orderBy('ended_at', 'desc')->paginate($limit);

		// set input
		$data['input'] = $input;
		
		return View::make('bagikasih.event.index', $data);
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
