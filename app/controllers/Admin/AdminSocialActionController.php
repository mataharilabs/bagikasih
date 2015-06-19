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

		if(Request::isMethod('post')){
			$input = Input::all();

			$started_at  = preg_split("/([\/: ])/", $input['expired_at']);
		    $input['expired_at']  = mktime((int) $started_at[3], 
		    	(int) $started_at[4],0,(int) $started_at[0],(int) $started_at[1],(int) $started_at[2]);
			
			$postSocialAction = SocialAction::StoreSocialAction($input);
			
			if($postSocialAction != 'ok'){
				Session::flash('validasi',$postSocialAction);
	   			return Redirect::route('admin.social-action.create')->withInput();
				
			}
			else{
				Session::flash('sukses','Aksi Sosial Berhasil di Rekap');
	   			return Redirect::route('admin.social-action')->withInput();
			}
		}

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
		
		$social_action = SocialAction::find($id)->first();

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
						$started_at  = preg_split("/([\/: ])/", $input['expired_at']);
		    $input['expired_at']  = mktime((int) $started_at[3], 
		    	(int) $started_at[4],0,(int) $started_at[0],(int) $started_at[1],(int) $started_at[2]);

			$updateSocialAction = SocialAction::UpdateSocialAction($input);

			if($updateSocialAction != 'ok'){
				Session::flash('validasi',$postSocialAction);
	   			return Redirect::route('admin.social-action.create')->withInput();
			}
			else{
				Session::flash('sukses','Aksi Sosial Berhasil di Update');
	   			return Redirect::route('admin.social-action')->withInput();
			}
		}
	}



	public function delete($id)
	{		
		$SocialAction = SocialAction::find($id);
		$SocialAction->delete();	
		Session::flash('sukses','Data berhasil dihapus');
	   	return Redirect::route('admin.social-action');
	}
}