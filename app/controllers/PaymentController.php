<?php

class PaymentController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Donation Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/

	public function create()
	{
		// get transferred_at
		// $transferred_at = explode('-', Input::get('transferred_at'));
		// $transferred_at = mktime(0,0,0,$transferred_at[1],$transferred_at[0],$transferred_at[2]);
		$transferred_at = strtotime(Input::get('transferred_at'));

		// get input
		$input = array(
			'user_id' 			=> Auth::user()->id,
			'currency'			=> Input::get('currency'),
			'total'				=> Input::get('total'),
			'transferred_at'	=> $transferred_at,
			'to_bank' 			=> Input::get('to_bank'),
			'bank_name'			=> Input::get('bank_name'),
			'bank_account'		=> Input::get('bank_account'),
			'bank_account_name'	=> Input::get('bank_account_name'),
			'message'			=> Input::get('message'),
			'donation_ids'		=> Input::get('donation_ids'),
		);
		
		$result = Payment::add($input);

		if ($result['success'])
		{
			Session::flash('success', 'Proses konfirmasi pengiriman donasi Anda berhasil. Selanjutnya kami mohon kesediaan Anda untuk menunggu Admin BagiKasih melakukan verifikasi. BagiKasih akan mengirim Anda email jika proses verivikasi telah dilakukan. Terima kasih.');

			if (Request::ajax())
			{
				return Response::json(['success' => true, 'redirect_url' => URL::route('riwayat-donasi')]);
			}
			else
			{
				return $result;
			}
		}
		else
		{
			// if fail
			if (Request::ajax())
			{
				return Response::json(json_encode($result));
			}
			else
			{
				return $result;
			}
		}

		return $result;
	}
}