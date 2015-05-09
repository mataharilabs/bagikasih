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
		$events = Events::with(array('city', 'category'))->where('status', '!=', 0);

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

	/*
		SELECT * FROM social_actions INNER JOIN social_action_events ON 
		social_action_events.social_action_id =  social_actions.id 
		WHERE social_action_events.event_id = xxxx
	*/
	public function show($id)
	{

		// init
		$data = array();

		$event = Events::getById($id);

		if ($event == false) return App::abort('404');
		
		$data['view'] = $event;

		// // get photos
		$data['photos'] = Photo::where('type_name', '=', 'events')
						->where('type_id', '=', $event->id)
						->where('status', '=', 1)
						->get();
		
		$data['social_actions'] = SocialAction::with(array('city', 'category'))
							->join('social_action_events','social_action_events.social_action_id', '=', 'social_actions.id')
							->where('event_id', '=', $event->id)
							->where('social_actions.status', '=', 1)
							->orderBy('social_actions.id', 'desc')
							->get();
							
		$data['social_target_id'] = SocialTarget::getAll();

		$data['social_action_category_id'] = SocialActionCategory::getAll();

		$data['city_id'] = City::getAll();
		
		return View::make('bagikasih.event.detail', $data);

	}

	public function create() {

		$data['event_category'] = EventCategory::getbyStatus();
		
		$data['city'] = City::getAll();

		return View::make('bagikasih.event.create',$data);
	}

	public function create_post() {

		$status = Events::createEvent(Input::all());
		
		if($status == 'ok'){
			Session::flash('sukses','Proses pendaftaran event berhasil dilakukan. Data Anda telah masuk ke dalam database kami. Selanjutnya admin dari BagiKasih akan melakukan verifikasi data Anda. Terima kasih.');
		}
		else{
			Session::flash('gagal','Proses pendaftaran event gagal dilakukan');
		}
		
		return $status;

	}

	public function update_post() {

		// Session::flash('sukses','Proses pendaftaran event berhasil dilakukan. Data Anda telah masuk ke dalam database kami. Selanjutnya admin dari BagiKasih akan melakukan verifikasi data Anda. Terima kasih.');

		return Events::updateUserId();
	
	}

}
