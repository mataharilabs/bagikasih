<?php

class AdminSocialTargetController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Social Target Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	private $_menu = 'social-target';


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
				$update = SocialTarget::find($getId);
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

	public function dropphoto(){
		$lokasi = public_path().'/photos';
		$getId  = Input::get('id');
		if(!empty($getId)){
			$delete = Photo::find($getId);
			$delete->delete();
			try {
				unlink($lokasi.$getId.'_t.jpg');
				unlink($lokasi.$getId.'.jpg');
				return "ok";
			} catch (Exception $e) {
				return "nothing _t.jpg";
			}
		}
	}


	public function index()
	{
		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Target Sosial',
			'description' => '',
			'breadcrumb' => array(
				'Target Sosial' => route('admin.social-target'),
			),
		);

		// Set social target
		$data['social_targets'] = SocialTarget::with(array('city', 'category', 'user'))->get();

		return View::make('admin.pages.social-target.index')
					->with($data);
	}

	public function show($id)
	{
		// get social target
		$social_target = SocialTarget::with(array('city', 'category', 'user'))->find($id);

		if ($social_target == null) return App::abort('404');

		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Target Sosial - ' . $social_target->name,
			'description' => '',
			'breadcrumb' => array(
				'Kategori Target Sosial' => route('admin.social-target'),
				$social_target->name => route('admin.social-target.show', $social_target->id),
			),
		);

		// Get Social Target
		$data['social_target'] = $social_target;

		// Get Social Actions that related with this
		$data['social_actions'] = SocialAction::with(array('city', 'category', 'user'))
										->where('social_target_id', '=', $social_target->id)
										->orderBy('id', 'desc')
										->get();

		// Get Donations that related with this
		$data['donations'] = Donation::with(array('user'))
										->where('type_name', '=', 'social_targets')
										->where('type_id', '=', $social_target->id)
										->orderBy('id', 'desc')
										->get();

		// Get Photos that related with this
		$data['photos'] = Photo::where('type_name', '=', 'social_targets')
										->where('type_id', '=', $social_target->id)
										->orderBy('id', 'desc')
										->get();

		return View::make('admin.pages.social-target.show')
					->with($data);
	}

	public function createPost(){

		if(Request::isMethod('post')){
			$input = Input::all();
			$postEvent = SocialTarget::StoreSocialTarget($input);


			if(array_key_exists('msg', $postEvent) && $postEvent['msg'] == 'ok'){
				// check if any mutliple upload photo 
				$CountPhoto = Photo::where('tmp',Session::get('time'))->count();
				if($CountPhoto > 0){	
					
					Photo::updatePhotos('social_targets',$postEvent['id']);

				}
				Session::flash('sukses','Target Sosial Berhasil di Rekap');
	   			return Redirect::route('admin.social-target')->withInput();
			}
			else{
				// get session validation
				Session::put('validasi','event');
				
				Session::flash('validasi',$postEvent);
	   			return Redirect::route('admin.social-target.create')->withInput();
			}
		}

	}

	public function create()
	{
		$data = array(
			'menu' => 'Target Sosial',
			'title' => 'Target Sosial',
			'description' => '',
			'breadcrumb' => array(
				'Target Sosial' => route('admin.social-target')
			),
		);

		$data['action'] = 'admin.social-target.create.post';
		$data['social_target'] = array();
		$data['social_target_category'] = SocialTargetCategory::all();
		$data['user'] = User::all();
		$data['city'] = City::all();
		$data['photos'] = array();

		if(Session::has('validasi') && Session::get('validasi') == 'event'){ 
			$time = time();
			Session::put('time', $time);	
		}
		// return $data;
		return View::make('admin.pages.social-target.create')->with($data);

	}

	public function update($id)
	{

		$data = array(
			'menu' => 'Target Sosial',
			'title' => 'Target Sosial',
			'description' => '',
			'breadcrumb' => array(
				'Target Sosial' => route('admin.social-target')
			),
		);
		
		if(Session::has('validasi') && Session::get('validasi') == 'event'){ 
			$time = time();
			Session::put('time', $time);	
		}
	
		$social_target = SocialTarget::where('id',$id)->first();

		$data['action'] = 'admin.social-target.update.post';
		$data['social_target'] = $social_target;
		$data['social_target_category'] = SocialTargetCategory::all();
		$data['user'] = User::all();
		$data['city'] = City::all();

		// Get Photos that related with this
		$data['photos'] = Photo::where('type_name', '=', 'social_targets')
										->where('type_id', '=', $social_target->id)
										->orderBy('id', 'desc')
										->get();

		// return $data;
		return View::make('admin.pages.social-target.create')->with($data);

	}

	public function updatePost(){
		if(Request::isMethod('post')){
			$input = Input::all();

			$updateEvent = SocialTarget::UpdateSocialTarget($input);
			
			$CountPhoto = Photo::where('tmp',Session::get('time'))->count();
			if($CountPhoto > 0){	
				
				Photo::updatePhotos('social_targets',$input['id']);
			}

			if($updateEvent != 'ok'){
				// get session validation
				Session::put('validasi','event');
				
				Session::flash('validasi',$updateEvent);
	   			return Redirect::route('admin.social-target.update',$input['id'])->withInput();
			}
			else{
				Session::flash('sukses','Target Sosial Berhasil di Update');
	   			return Redirect::route('admin.social-target')->withInput();
			}
		}
	}

	public function delete($id)
	{		
		$SocialAction = SocialTarget::where('id',$id);
		$SocialAction->delete();	
		Session::flash('sukses','Data berhasil dihapus');
	   	return Redirect::route('admin.social-target');
	}
}