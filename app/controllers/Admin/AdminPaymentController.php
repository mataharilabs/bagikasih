<?php

class AdminPaymentController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Payment Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	private $_menu = 'donation';

	public function index()
	{
		
	}

	public function show($id)
	{
		// get payment
		$payment = Payment::with(array('user', 'donations'))->find($id);

		if ($payment == null) return App::abort('404');

		// init
		$data = array(
			'menu' => $this->_menu,
			'title' => 'Donasi & Pembayaran - ' . $payment->id,
			'description' => '',
			'breadcrumb' => array(
				'Donasi & Pembayaran' => route('admin.donation'),
				$payment->id => route('admin.payment.show', $payment->id),
			),
		);

		foreach ($payment->donations as $i => $donation)
		{
			$donation->setAppends(array('type'));
		}

		$data['payment'] = $payment;
		
		return View::make('admin.pages.payment.show')
					->with($data);
	}
}