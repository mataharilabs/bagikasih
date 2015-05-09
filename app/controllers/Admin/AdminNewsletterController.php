<?php

class AdminNewsletterController extends AdminBaseController{
	/*
	|--------------------------------------------------------------------------
	| Newsletter Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	private $_menu = 'master';

	public function index()
	{
		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Newsletter',
			'description' => '',
			'breadcrumb' => array(
				'Newsletter' => route('admin.newsletter'),
			),
		);

		// Set data
		$data['data'] = Newsletter::all();

		return View::make('admin.pages.newsletter.index')
					->with($data);
	}

	public function show($id)
	{
		// get data
		$newsletter = Newsletter::with('user')->find($id);

		if ($newsletter == null) return App::abort('404');

		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Newsletter - ' . $newsletter->user->firstname,
			'description' => '',
			'breadcrumb' => array(
				'Newsletter' => route('admin.newsletter'),
				$newsletter->user->firstname => route('admin.newsletter.show', $newsletter->id),
			),
		);

		// Set data
		$data['data'] = $newsletter;

		return View::make('admin.pages.newsletter.show')
					->with($data);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function create()
	{		
		$data = array(
			'menu' 	=> $this->_menu,
			'title' => 'Newsletter+',
			'description' 	=> '',
			'breadcrumb' 	=> array(
				'Newsletter' 	=> route('admin.newsletter')			
			),
			'optionsUser' 	=> Newsletter::optionsUser(),
		);

		return View::make('admin.pages.newsletter.create', $data);
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function store()
	{		
		$validator = $this->storeValid();
		if($validator->passes())
		{		
			$input 				= $this->storeInput();
			$newsletter 		= Newsletter::addNew($input);			
			if($newsletter)
			{			
				return Redirect::route('admin.newsletter')->withStatuses(['add'=>'Tambah Berhasil!']);
			}	
			return Redirect::route('admin.newsletter.create')->withErrors(['add'=>'Tambah Gagal!'])->withInput();
		}
		return Redirect::route('admin.newsletter.create')->withErrors($validator)->withInput();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function storeInput()
	{
		return ['user_id'			=> Input::get('user'), 
				'type'				=> Input::get('type'),
				'sender_email'		=> Input::get('sender_email'), 
				'sender_name'		=> Input::get('sender_name'),
				'recipient_email'	=> Input::get('recipient_email'), 
				'recipient_name'	=> Input::get('recipient_email'),
				'subject'			=> Input::get('subject'), 
				'message'			=> Input::get('message'), 
				'status'			=> Input::get('status')];				
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function storeValid()
	{
		return Validator::make(Input::all(), [
				'user'				=> 'required', 
				'type'				=> 'required',
				'sender_email'		=> 'required|email', 
				'sender_name'		=> 'required',
				'recipient_email'	=> 'required', 
				'recipient_name'	=> 'required',
				'subject'			=> 'required', 
				'message'			=> 'required', 
				'status'			=> 'required',
				]);
	}

	public function update(Newsletter $newsletter)
	{		
		$data 		= array(
			'menu' 				=> $this->_menu,
			'title' 			=> 'Newsletter+',
			'description' 		=> '',
			'breadcrumb' 		=> array(
				'Newsletter'	=> route('admin.newsletter')			
			),			
			'optionsUser' 		=> Newsletter::optionsUser(),
			'data' 				=> $newsletter,
		);

		return View::make('admin.pages.newsletter.edit', $data);
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function updateDo()
	{
		$validator = $this->updateValid();
		if($validator->passes())
		{
			$input = $this->updateInput();
			
			$save  = Newsletter::edit($input);			
			if($save)
			{
				return Redirect::route('admin.newsletter')->withStatuses(['edit'=> 'Data Berhasil di edit!']);
			}
			return Redirect::route('admin.newsletter')->withErrors(['edit'=> 'Data Gagal di edit!']);
		}
		return Redirect::back()->withErrors($validator)->withInput();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function updateInput()
	{
			return [
				'id'				=> Input::get('id'),
				'user_id'			=> Input::get('user'), 
				'type'				=> Input::get('type'),
				'sender_email'		=> Input::get('sender_email'), 
				'sender_name'		=> Input::get('sender_name'),
				'recipient_email'	=> Input::get('recipient_email'), 
				'recipient_name'	=> Input::get('recipient_email'),
				'subject'			=> Input::get('subject'), 
				'message'			=> Input::get('message'), 
				'status'			=> Input::get('status')];				
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function updateValid()
	{
			return Validator::make(Input::all(), [
				'user'				=> 'required', 
				'type'				=> 'required',
				'sender_email'		=> 'required|email', 
				'sender_name'		=> 'required',
				'recipient_email'	=> 'required', 
				'recipient_name'	=> 'required',
				'subject'			=> 'required', 
				'message'			=> 'required', 
				'status'			=> 'required',
				]);
	}

	public function delete(Newsletter $newsletter)
	{
		$data = array(
			'menu' 	=> $this->_menu,
			'title' => 'Newsletter+',
			'description' => '',
			'breadcrumb' => array(
				'Newsletter' => route('admin.newsletter')			
			),
			'data' 	=> $newsletter
		);
		return View::make('admin.pages.newsletter.delete', $data);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function deleteDo()
	{	
		$id 			= Input::get('id');
					
		$newsletter = Newsletter::remove($id);
		if($newsletter)
		{
			return Redirect::route('admin.newsletter')->withStatuses(['delete' => 'Hapus Sukses!']);
		}
		return Redirect::route('admin.newsletter')->withErrors(['delete' => 'Hapus Gagal!']);		
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function deleteValid($id)
	{
		$exist =  Newsletter::isExist($id);
		if($exist)
		{
			return false;
		}
		return true;
	}
}