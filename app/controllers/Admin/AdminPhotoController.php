<?php

class AdminPhotoController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Event Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/
	private $_menu = 'photos';

	public function index()
	{
		// init
		$event =Events::with(array('city', 'eventcategory', 'user'))
										->get();
		$data = array(
			'menu' => 'event',
			'title' => 'Event',
			'description' => '',
			'breadcrumb' => array(
				'Event' => route('admin.event'),
			),
		);

		$data['event'] = $event;

		return View::make('admin.pages.event.index')
					->with($data);
	}


	public function show($id){



		// init
		$event = Events::with(array('city', 'eventcategory', 'user'))
										->where('id', '=', $id)
										->orderBy('id', 'desc')
										->first();
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Event - ' . $event->name,
			'description' => '',
			'breadcrumb' => array(
				'Event' => route('admin.event'),
				$event->name => route('admin.event.show', $event->id),
			),
		);


		if ($event == null) return App::abort('404');

		$data['event'] = $event;

		$social_action = SocialActionEvent::with(array('user','socialAction'))
										->where('event_id', '=', $event['id'])
										->orderBy('id', 'desc')
										->get();
		// Get category
		// $data['social_actions'] = $social_action;

		$sos = array();
		foreach ($social_action as $val) {
			# code...
			$sos[] = $val['social_action'];
		}
		$data['social_actions'] = $sos;
		
		// Get Photos that related with this
		$data['photos'] = Photo::where('type_name', '=', 'social_actions')
										->where('type_id', '=', $social_action[0]->id)
										->orderBy('id', 'desc')
										->get();

		return View::make('admin.pages.event.show')
					->with($data);

	}
	
}