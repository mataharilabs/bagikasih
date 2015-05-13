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
			'title' => 'Pembayaran - ' . $payment->id,
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

	public function approve($id)
	{
		$result = Payment::approve($id);

		if ($result['success'])
		{
			$message = 'Proses Persetujuan Pembayaran berhasil.';
		}
		else
		{
			$message = $result['errors'][0];
		}

		return Redirect::route('admin.payment.show', $id)
							->with('message', $message)
							->with('success', $result['success']);
	}

	public function delete($id)
	{
		$result = Payment::reject($id);

		if ($result['success'])
		{
			$message = 'Proses Pembatalan Pembayaran berhasil.';
		}
		else
		{
			$message = $result['errors'][0];
		}

		return Redirect::route('admin.payment.show', $id)
							->with('message', $message)
							->with('success', $result['success']);
	}
}