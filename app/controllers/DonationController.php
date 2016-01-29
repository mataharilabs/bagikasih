<?php

class DonationController extends BaseController {

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
		$data 	= array();

		// get Donation data
		$donations = Donation::with(array('user'))
						->where('status', '!=', 3)
						->orderBy('id', 'asc')
						->get();

		if (count($donations))
		{
			foreach ($donations as $donation)
			{
				$donation->setAppends(array('type'));

				$data['donations'][] = $donation;
			}
		}
		else
		{
			$data['donations'] = array();
		}

		return View::make('bagikasih.donation.index', $data);
	}

	public function show($donation_code)
	{
		// init
		$data = array();

		// get donation id
		$donation_id = Donation::getDonationId($donation_code);

		// get Donation data
		$donation = Donation::with(array('user'))
						->where('id', '=', $donation_id)
						->where('status', '!=', 3)
						->first();

		if ($donation == null) return App::abort('404');

		// get type
		$donation->setAppends(array('type'));

		// set data
		$data = array(
			'donation' => $donation,
		);

		return View::make('bagikasih.donation.detail', $data);
	}
	public function status()
	{
		// Includes Veritrans
		include app_path().'/packages/veritrans/Veritrans.php';
		// Veritans configuration
		Veritrans_Config::$serverKey = 'VT-server-YN3xDgcjXol4o0mgbOs-A72D';
		
		// init
		$data = array();
		// get input
		$param = Input::all();
		try {
			// Check status transaksi ke server Veritrans
			$check = Veritrans_Transaction::status($param['order_id']);
			var_dump($check);
			// Order id
			$cipher = 'm4t4h4r1899';
			$iv = sprintf("%016d",Auth::user()->id); // Mempola Initialization Vector dengan User id

			// -- Decrypt order_id dengan algoritma AES-256
			$order_id = openssl_decrypt($param['order_id'], 'AES-256-CBC',$cipher, 0, $iv);
			$order_id = explode("_",$order_id,2);
			$donation_id = (int) $order_id[1];
			
			$donation = Donation::where('id', '=', $donation_id)
						->where('status', '!=', 3)
						->first();
			// Check
			$code = DB::table('payment_code')->where('order_id',$param['order_id']);
			if($code->count() > 0){
				$vtweb_url = 'https://vtweb.sandbox.veritrans.co.id/v2/vtweb/'.$code->pluck('code');
			} else {
				$transaction = array(
					'transaction_details' => array(
						'order_id' => $param['order_id'],
						'gross_amount' => (int) $donation->total, // no decimal allowed for creditcard
					),
					"vtweb" => array(
						"credit_card_3d_secure" => true
					),
					'customer_details' => array(
						'first_name' => Auth::user()->firstname,
						'last_name' => Auth::user()->lastname,
					)
				);
				// Mendapatkan checkout url
				$vtweb_url = Veritrans_Vtweb::getRedirectionUrl($transaction);
				$insert_code = DB::table('payment_code')->insert(array(
					'order_id' => $param['order_id'],
					'user_id' => Auth::user()->id,
					'donation_id' => $donation->id,
					'code' => basename($vtweb_url)
				));
			}
			
			$data = array(
				'status_code' => $check->status_code,
				'donation' => $donation
			);
		} catch(Exception $ex){
			$data['status_code'] = '404';
		}
		return View::make('bagikasih.donation.status',$data);
	}

	public function create()
	{
		// get input
		$input = Input::all();
		if(Auth::check()){
			$input['user_id'] = Auth::user()->id;
		} else {
			// Check apakah user ada di database
			$check_user = User::where('email',$input['email']);
			if($check_user->count() > 0){
				$input['user_id'] = $check_user->pluck('id');
			} else {
				// Membuat user baru dengan status draft (status:2)
				$post = new User;
	            $post->email = $input['email'];
	            $post->status = 2;
	            $post->save();
				$input['user_id'] = $post->id;
			}
		}
		unset($input['email']);
		
		$result = Donation::add($input);

		if ($result['success'])
		{
			// if success
			// create donation code
			$donation_code = Donation::generateDonationCode($result['data']->id);

			if (Request::ajax())
			{
				return Response::json(['success' => true, 'redirect_url' => URL::route('lihat-donasi', $donation_code)]);
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

	public function delete()
	{
		// get user id
		$user_id = Auth::user()->id;

		$result = Donation::whereIn('id', Input::get('donations'))
							->where('user_id', '=', $user_id)
							->update(array('status' => 3));

		Session::flash('success', 'Proses pembatalam donasi Anda berhasil dilakukan. Terima kasih.');

		return serialize(Input::get('donations'));
	}

}
