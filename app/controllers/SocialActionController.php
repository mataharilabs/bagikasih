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
		$social_actions = SocialAction::with(array('city', 'category'))->where('status', '!=', 0);

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
		$data = array();

		$social_actions = SocialAction::getById($id);

		if ($social_actions == false) return App::abort('404');

		$photos = Photo::where('type_name', '=', 'social_actions')
						->where('type_id', '=', $social_actions->id)
						->where('status', '=', 1)
						->get();

		$donations = Donation::with(array('user'))
							->where('type_name', '=', 'social_actions')
							->where('type_id', '=', $social_actions->id)
							->where('status', '=', 1)
							->orderBy('id', 'desc')
							->get();
		
		$user = User::getUserId($social_actions->user_id);
		
		$social_target_id = SocialTarget::getAll();

		$social_action_category_id = SocialActionCategory::getAll();

		$city_id = City::getAll();

		$data = array(
			'social_action' => $social_actions,
			'photos'	=> $photos,
			'donations'	=> $donations,
			'user'	=> $user,
			'social_target_id'	=> $social_target_id,
			'social_action_category_id'	=> $social_action_category_id,
			'city_id'	=> $city_id,
		);

		return View::make('bagikasih.social-action.detail', $data);	

	}


	public function getSession($id){

		$data = array();

		$social_actions = SocialAction::with('socialTarget','user')->where('id',$id)->first();

		if ($social_actions == false) return App::abort('404');

		$photos = Photo::where('type_name', '=', 'social_actions')
						->where('type_id', '=', $social_actions->id)
						->where('status', '=', 1)
						->get();

		$donations = Donation::with(array('user'))
							->where('type_name', '=', 'social_actions')
							->where('type_id', '=', $social_actions->id)
							->where('status', '=', 1)
							->orderBy('id', 'desc')
							->get();
		
		$user = User::getUserId($social_actions->user_id);
		
		$social_target_id = SocialTarget::getAll();

		$social_action_category_id = SocialActionCategory::getAll();

		$city_id = City::getAll();

		$data = array(
			'social_action' => $social_actions,
			'photos'	=> $photos,
			'donations'	=> $donations,
			'user'	=> $user,
			'social_target_id'	=> $social_target_id,
			'social_action_category_id'	=> $social_action_category_id,
			'city_id'	=> $city_id,
		);

		Session::put('type_name', 'SocialAction');

		Session::put('type_id', $social_actions->social_target_id);

		return Redirect::route('buat-aksi-sosial');

	}

	// input data 
	public function create(){

		$data['social_action'] = array();
		$data['social_target'] = SocialTarget::all();
		$data['social_action_category'] = SocialActionCategory::all();
		$data['user'] = User::all();
		$data['city'] = City::all();
		$data['action'] = 'buat-aksi-sosial.post';

		if(Request::isMethod('post')){
			$input = Input::all();

			$postSocialAction = SocialAction::StoreSocialActionFront($input);
			
			if($postSocialAction != 'ok'){
				Session::flash('validasi',$postSocialAction);
	   			return Redirect::route('buat-aksi-sosial');
			}
			else{
				Session::flash('sukses','Proses pendaftaran aksi sosial berhasil dilakukan. Data Anda telah masuk ke dalam database kami. Selanjutnya admin dari BagiKasih akan melakukan verifikasi data Anda. Terima kasih.');
	   			return Redirect::route('temukan-aksi-sosial');
			}
		}

		return View::make('bagikasih.social-action.create')->with($data);	
	}
}
