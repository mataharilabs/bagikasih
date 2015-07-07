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
				$update = SocialAction::find($getId);
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

	public function createPost(){

		if(Request::isMethod('post')){
			$input = Input::all();

			$postSocialAction = SocialAction::StoreSocialAction($input);

			// check if any mutliple upload photo 
			$CountPhoto = Photo::where('tmp',Session::get('time'))->count();
			if($CountPhoto > 0){	
				$photo = Photo::where('tmp',Session::get('time'))->get();
				foreach ($photo as $value) {
					$update = Photo::find($value['id']);
					$update->type_name = 'social_actions';
					$update->type_id = $postSocialAction['id'];
					$update->tmp = 0;
					$update->save();
				}
			}

			if(array_key_exists('msg', $postSocialAction) && $postSocialAction['msg'] == 'ok'){
				Session::flash('sukses','Aksi Sosial Berhasil di Rekap');
	   			return Redirect::route('admin.social-action')->withInput();
			}
			else{
				Session::flash('validasi',$postSocialAction);
	   			return Redirect::route('admin.social-action.create')->withInput();
				
			}
		}
	}

	public function create()
	{
		$data = array(
			'menu' => 'Aksi Sosial',
			'title' => 'Aksi Sosial',
			'description' => '',
			'breadcrumb' => array(
				'Kategori Aksi Social' => route('admin.social-action')
			),
		);

		$data['action'] = 'admin.social-action.create.post';
		$data['social_action'] = array();
		$data['social_target'] = SocialTarget::all();
		$data['social_action_category'] = SocialActionCategory::all();
		$data['user'] = User::all();
		$data['city'] = City::all();

		$time = time();
		Session::put('time', $time);

		return View::make('admin.pages.social-action.create')->with($data);

	}

	public function update($id)
	{

		$data = array(
			'menu' => 'Aksi Sosial',
			'title' => 'Aksi Sosial',
			'description' => '',
			'breadcrumb' => array(
				'Kategori Aksi Social' => route('admin.social-action')
			),
		);
		

		$time = time();
		Session::put('time', $time);		
		
		$social_action = SocialAction::where('id',$id)->first();
		$data['action'] = 'admin.social-action.update.post';
		$data['social_action'] = $social_action;
		$data['social_target'] = SocialTarget::all();
		$data['social_action_category'] = SocialActionCategory::all();
		$data['user'] = User::all();
		$data['city'] = City::all();

		return View::make('admin.pages.social-action.create')->with($data);

	}

	public function updatePost(){
		if(Request::isMethod('post')){
			$input = Input::all();

			$updateSocialAction = SocialAction::UpdateSocialAction($input);

			// check if any mutliple upload photo 
			$CountPhoto = Photo::where('tmp',Session::get('time'))->count();
			if($CountPhoto > 0){	
				$photo = Photo::where('tmp',Session::get('time'))->get();
				foreach ($photo as $value) {
					$update = Photo::find($value['id']);
					$update->type_name = 'social_actions';
					$update->type_id = $input['id'];
					$update->tmp = 0;
					$update->save();
				}
			}
			if($updateSocialAction != 'ok'){
				Session::flash('validasi',$updateSocialAction);
	   			return Redirect::route('admin.social-action.update',array($input['id']))->withInput();
			}
			else{
				Session::flash('sukses','Aksi Sosial Berhasil di Update');
	   			return Redirect::route('admin.social-action')->withInput();
			}
		}
	}

	//gambar default 
	public function setdefault(){

	}


	public function delete($id)
	{		
		$SocialAction = SocialAction::find($id);
		$SocialAction->delete();	
		Session::flash('sukses','Data berhasil dihapus');
	   	return Redirect::route('admin.social-action');
	}
}