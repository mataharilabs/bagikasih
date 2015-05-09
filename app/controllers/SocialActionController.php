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

		// return $data;

		return View::make('bagikasih.social-action.detail', $data);	

	}

	// input data 
	public function create() {

		$upload_gambar = Photo::recordImage();

		$input =  array(
			'social_target_id' => Input::get('social_target_id'),
			'social_action_category_id' => Input::get('social_action_category_id'),
			'user_id' => Auth::user()->id,
			'city_id' => Input::get('city_id'),
			'default_photo_id'=> is_numeric($upload_gambar) ? $upload_gambar : 'NULL',
			'cover_photo_id' => 1,
			'name' => Input::get('name'),
			'description' => Input::get('description'),
			'stewardship' => Input::get('stewardship'),
			'bank_account_description' => Input::get('bank_account_description'),
			// 'slug' => Input::get('slug'),
			'currency' => Input::get('currency'),
			'total_donation_target' => Input::get('total_donation_target'),
			'expired_at' => Input::get('expired_at'),
		); 

		$post = SocialAction::createSocialAction($input);

		if($post == 'ok'){
			Session::flash('sukses','Proses pembuatan aksi sosial berhasil dilakukan. Data Anda telah masuk ke dalam database kami. Selanjutnya admin dari BagiKasih akan melakukan verifikasi data Anda. Terima kasih.');
		}
		else{
			Session::flash('gagal','Proses pembuatan aksi sosial gagal dilakukan');
		}
		
		return $post;
		
	}

}
