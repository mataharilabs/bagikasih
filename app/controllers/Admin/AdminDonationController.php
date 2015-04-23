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