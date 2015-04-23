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

		// get user id
		$user_id = Auth::user()->id;

		// get Donation data
		$donations = Donation::with(array('user'))
						->where('user_id', '=', $user_id)
						->where('status', '!=', 3)
						->orderBy('id', 'asc')
						->get();

		foreach ($donations as $donation)
		{
			$donation->setAppends(array('type'));

			$data['donations'][] = $donation;
		}

		return View::make('bagikasih.donation.index', $data);
	}

	public function show($donation_code)
	{
		// init
		$data = array();

		// get donation id
		$donation_id = Donation::getDonationId($donation_code);

		// get user id
		$user_id = Auth::user()->id;

		// get Donation data
		$donation = Donation::with(array('user'))
						->where('id', '=', $donation_id)
						->where('user_id', '=', $user_id)
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

	public function create()
	{
		// get input
		$input = array(
			'user_id' 	=> Auth::user()->id,
			'type_name' => Input::get('type_name'),
			'type_id' 	=> Input::get('type_id'),
			'currency'	=> Input::get('currency'),
			'total'		=> Input::get('total'),
			'message'	=> Input::get('message'),
			'as_noname'	=> Input::get('as_noname'),
		);
		
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
