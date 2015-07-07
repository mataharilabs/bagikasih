<?php

class AdminEventController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Event Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/
	private $_menu = 'events';


	public function photomulti() {

	}

	public function setphoto() {
		$lokasi = public_path().'/photos';
		// get id Social Action
		$getId    = Input::get('id');
		// default photo 
		$getImage = Input::get('image');
		// check Photo exists on database
		$photo    = Photo::where('id',$getImage)->first();
		if(!empty($photo['id'])) {
			// check file exist
			$file = $lokasi.'/'.$photo['id'].'.jpg';
			if(file_exists($file)) {
				$update = Event::find($getId);
			    $update->default_photo_id = $photo['id'];
			    $update->save();
			    // return $file;
			    	    return '<img src="'.url('photos').'/'.$photo['id'].'.jpg'.'" class="img-polaroid img-rounded" style="width:150px;height:120px;">';
			}
			else{
				return "fail";
			}
		}
		return $photo['id'];
	}


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
		if(count($social_action) > 0){
			
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
			
		}
		else{
			$data['social_actions'] = array();
		}

		return View::make('admin.pages.event.show')
					->with($data);
	}

	public function createPost(){
		if(Request::isMethod('post')){
			$input = Input::all();

			$postEvent = Events::StoreEvent($input);



			if(array_key_exists('msg', $postEvent) && $postEvent['msg'] == 'ok'){
				// check if any mutliple upload photo 
				$CountPhoto = Photo::where('tmp',Session::get('time'))->count();
				if($CountPhoto > 0){	
					$photo = Photo::where('tmp',Session::get('time'))->get();
					foreach ($photo as $value) {
						$update = Photo::find($value['id']);
						$update->type_name = 'events';
						$update->type_id = $postEvent['id'];
						$update->tmp = 0;
						$update->save();
					}
				}
				Session::flash('sukses','Event Berhasil di Rekap');
	   			return Redirect::route('admin.event')->withInput();
			}
			else{
				Session::flash('validasi',$postEvent);
	   			return Redirect::route('admin.event.create')->withInput();
			}
		}
	}

	public function create()
	{
		$data = array(
			'menu' => 'Event',
			'title' => 'Event',
			'description' => '',
			'breadcrumb' => array(
				'Event' => route('admin.event')
			),
		);

		$time = time();
		Session::put('time', $time);
		
		$data['photos'] = array();

		$data['action'] = 'admin.event.create.post';
		$data['event'] = array();
		$data['event_category'] = EventCategory::all();
		$data['user'] = User::all();
		$data['city'] = City::all();


		return View::make('admin.pages.event.create')->with($data);

	}

	public function update($id)
	{

		$data = array(
			'menu' => 'Event',
			'title' => 'Event',
			'description' => '',
			'breadcrumb' => array(
				'Event' => route('admin.event')
			),
		);
		

		$time = time();
		Session::put('time', $time);

		$event = Events::where('id',$id)->first();

		$data['action'] = 'admin.event.update.post';
		$data['event'] = $event;
		$data['event_category'] = EventCategory::all();
		$data['user'] = User::all();
		$data['city'] = City::all();

		$data['photos'] = Photo::where('type_name', '=', 'events')
										->where('type_id', '=', $event->id)
										->orderBy('id', 'desc')
										->get();

		// return $data;
		return View::make('admin.pages.event.create')->with($data);

	}

	public function updatePost(){
		if(Request::isMethod('post')){
			$input = Input::all();
			$updateEvent = Events::UpdateEvent($input);


			// check if any mutliple upload photo 
			$CountPhoto = Photo::where('tmp',Session::get('time'))->count();
			if($CountPhoto > 0){	
				$photo = Photo::where('tmp',Session::get('time'))->get();
				foreach ($photo as $value) {
					$update = Photo::find($value['id']);
					$update->type_name = 'events';
					$update->type_id = $input['id'];
					$update->tmp = 0;
					$update->save();
				}
			}

			if($updateEvent != 'ok'){
				Session::flash('validasi',$updateEvent);
	   			return Redirect::route('admin.event.update',$input['id'])->withInput();	
	   		}
			else{
				Session::flash('sukses','Events Berhasil di Update');
	   			return Redirect::route('admin.event')->withInput();

			}
		}
	}


	public function delete($id)
	{	

		$Event = Events::where('id',$id);
		$Event->delete();	
		Session::flash('sukses','Data berhasil dihapus');
	   	return Redirect::route('admin.event');
	}

	
}