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

		// Get category
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

	public function create()
	{
		
	}

	public function update($id)
	{
		
	}

	public function delete($id)
	{
		
	}
}