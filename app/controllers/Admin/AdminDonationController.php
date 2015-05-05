<?php

class AdminDonationController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Donation Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	private $_menu = 'donation';

	public function index()
	{
		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Donasi & Pembayaran',
			'description' => '',
			'breadcrumb' => array(
				'Donasi & Pembayaran' => route('admin.donation'),
			),
		);

		// get Donation data
		$donations = Donation::with(array('user'))->get();

		foreach ($donations as $donation)
		{
			$donation->setAppends(array('type'));

			$data['donations'][] = $donation;
		}

		return View::make('admin.pages.donation.index')
					->with($data);
	}

	public function show($id)
	{
		// get donation
		$donation = Donation::with(array('user'))->find($id);

		if ($donation == null) return App::abort('404');

		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Donasi & Pembayaran - ' . $donation->id,
			'description' => '',
			'breadcrumb' => array(
				'Donasi & Pembayaran' => route('admin.donation'),
				$donation->id => route('admin.donation.show', $donation->id),
			),
		);

		// Get Donation
		$donation->setAppends(array('type'));
		$data['donation'] = $donation;

		// Get Payment that related with this
		if ($donation->payment_id != NULL)
		{
			$payment = Payment::with(array('user', 'donations'))->find($donation->payment_id);

			foreach ($payment->donations as $i => $donation)
			{
				$donation->setAppends(array('type'));
			}

			$data['payment'] = $payment;
		}
		
		return View::make('admin.pages.donation.show')
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
			'title' => 'EventCategory+',
			'description' 	=> '',
			'breadcrumb' 	=> array(
				'Social Target Category' 	=> route('admin.event-category')			
			),		
		);

		return View::make('admin.pages.event-category.create', $data);
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
			$input 		= $this->storeInput();
			$event_category 		= EventCategory::add($input);			
			if($event_category)
			{			
				return Redirect::route('admin.event-category')->withStatuses(['add'=>'Tambah Berhasil!']);
			}	
			return Redirect::route('admin.event-category.create')->withErrors(['add'=>'Tambah Gagal!'])->withInput();
		}
		return Redirect::route('admin.event-category.create')->withErrors($validator)->withInput();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function storeInput()
	{
		return ['name'		=> Input::get('name'), 				
				'status' 	=> Input::get('status')];				
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function storeValid()
	{
		return Validator::make(Input::all(), ['name'=> 'required', 'status'=> 'required']);
	}

	public function update(EventCategory $event_category)
	{		
		$data 		= array(
			'menu' 				=> $this->_menu,
			'title' 			=> 'EventCategory+',
			'description' 		=> '',
			'breadcrumb' 		=> array(
				'Negara' 		=> route('admin.event-category')			
			),			
			'data' 				=> $event_category,
		);

		return View::make('admin.pages.event-category.edit', $data);
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
			
			$save  = EventCategory::edit($input);			
			if($save)
			{
				return Redirect::route('admin.event-category')->withStatuses(['edit'=> 'Data Berhasil di edit!']);
			}
			return Redirect::route('admin.event-category')->withErrors(['edit'=> 'Data Gagal di edit!']);
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
		return ['id'		=> Input::get('id'), 
				'name'		=> Input::get('name'),				
				'status'	=> Input::get('status')];
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
								'id'		=> 'required', 
								'name'		=> 'required', 								
								'status'	=> 'required']);
	}

	public function delete(EventCategory $event_category)
	{
		$data = array(
			'menu' 	=> $this->_menu,
			'title' => 'EventCategory+',
			'description' => '',
			'breadcrumb' => array(
				'Negara' => route('admin.event-category')			
			),
			'data' 	=> $event_category
		);
		return View::make('admin.pages.event-category.delete', $data);
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
		$validator 		= $this->deleteValid($id);
		if($validator)
		{		
			$event_category = EventCategory::remove($id);
			if($event_category)
			{
				return Redirect::route('admin.event-category')->withStatuses(['delete' => 'Hapus Sukses!']);
			}
			return Redirect::route('admin.event-category')->withErrors(['delete' => 'Hapus Gagal!']);
		}
		return Redirect::route('admin.event-category')->withErrors(['used'=> 'Maaf, data ini masih digunakan! Hapus Gagal.']);
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function deleteValid($id)
	{
		$exist =  EventCategory::isExist($id);
		if($exist)
		{
			return false;
		}
		return true;
	}
}