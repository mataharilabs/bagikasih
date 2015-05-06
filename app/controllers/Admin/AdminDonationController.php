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
			'title' => 'Donation+',
			'description' 	=> '',
			'breadcrumb' 	=> array(
				'Social Target Category' 	=> route('admin.donation')			
			),	
			'options_user'			=> Donation::optionsUser(),	
			'options_type_name' 	=> ['','social_targets' => 'Social Target', 'social_actions' => 'Social Action'],
			'options_type_id' 		=> ['','1', '2'],
			'options_currency' => ['IDR' => 'Rupiah', 'USD' => 'US Dollar'],
		);

		return View::make('admin.pages.donation.create', $data);
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function store()
	{		
		$validator 			= $this->storeValid();
		
		if($validator->passes())
		{		
			$input 			= $this->storeInput();
			$donation 		= Donation::addNew($input);			
			if($donation)
			{			
				return Redirect::route('admin.donation')->withStatuses(['add'=>'Tambah Berhasil!']);
			}	
			return Redirect::route('admin.donation.create')->withErrors(['add'=>'Tambah Gagal!'])->withInput();
		}
		return Redirect::route('admin.donation.create')->withErrors($validator)->withInput();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function storeInput()
	{
		return ['user_id'	=> Input::get('user'), 				
				'payment_id'=> Input::get('payment_id'),
				'type_name'	=> Input::get('type_name'), 				
				'type_id' 	=> Input::get('type_id'),
				'currency'	=> Input::get('currency'), 				
				'total' 	=> Input::get('total'),
				'message'	=> Input::get('message'), 				
				'as_noname'	=> Input::get('as_noname'),							
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
		return Validator::make(Input::all(), [
				'user'		=> 'required|exists:users,id', 				
				'payment'	=> 'required',
				'type_name'	=> 'required', 				
				'type_id' 	=> 'required|integer',
				'currency'	=> 'required', 				
				'total' 	=> 'required|numeric',
				'message'	=> 'required', 				
				'as_noname'	=> 'required',							
				'status' 	=> 'required'
				]);
	}

	public function update(Donation $donation)
	{		
		$data 		= array(
			'menu' 				=> $this->_menu,
			'title' 			=> 'Donation+',
			'description' 		=> '',
			'breadcrumb' 		=> array(
				'Negara' 		=> route('admin.donation')			
			),			
			'data' 				=> $donation,
		);

		return View::make('admin.pages.donation.edit', $data);
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
			
			$save  = Donation::edit($input);			
			if($save)
			{
				return Redirect::route('admin.donation')->withStatuses(['edit'=> 'Data Berhasil di edit!']);
			}
			return Redirect::route('admin.donation')->withErrors(['edit'=> 'Data Gagal di edit!']);
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

	public function delete(Donation $donation)
	{
		$data = array(
			'menu' 	=> $this->_menu,
			'title' => 'Donation+',
			'description' => '',
			'breadcrumb' => array(
				'Negara' => route('admin.donation')			
			),
			'data' 	=> $donation
		);
		return View::make('admin.pages.donation.delete', $data);
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
			$donation = Donation::remove($id);
			if($donation)
			{
				return Redirect::route('admin.donation')->withStatuses(['delete' => 'Hapus Sukses!']);
			}
			return Redirect::route('admin.donation')->withErrors(['delete' => 'Hapus Gagal!']);
		}
		return Redirect::route('admin.donation')->withErrors(['used'=> 'Maaf, data ini masih digunakan! Hapus Gagal.']);
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function deleteValid($id)
	{
		return true;
	}
}