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

	public function index()
	{
		// init
		$data = array(
			'menu' => 'donation',
			'title' => 'Donasi & Pembayaran',
			'description' => '',
			'breadcrumb' => array(
				'Donasi & Pembayaran' => route('admin.donation'),
			),
		);

		return View::make('admin.pages.donation.index')
					->with($data);
	}

	
}