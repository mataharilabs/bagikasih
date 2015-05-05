<?php

class Payment extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'payments';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function donations()
    {
        return $this->hasMany('Donation');
    }

	public static function add($input)
	{
 		// init
 		$total_donation = 0;
 		$currency = 'IDR';

 		// get payment ids
    	$donation_ids = explode(',', $input['donation_ids']);
    	unset($input['donation_ids']);

 		// compare total of donation with total of payment
 		$donations = Donation::whereIn('id', $donation_ids)->get();

 		foreach ($donations as $donation)
 		{
 			$total_donation += $donation->total;
 			$currency = $donation->currency;
 		}

 		if ($total_donation > $input['total'])
 		{
 			return array(
  	 			'success' => false,
  	 			'errors' => array('Total yang Anda inputkan tidak sama dengan total donasi Anda. Jika Anda ingin melakukan perubahan donasi silahkan batalkan donasi sebelumnya dan lakukan donasi kembali.'),
  	 		);
 		}
 		else if ($currency != $input['currency'])
 		{
 			return array(
  	 			'success' => false,
  	 			'errors' => array('Mata uang yang Anda inputkan tidak sama dengan mata uang donasi Anda. Jika Anda ingin melakukan perubahan donasi silahkan batalkan donasi sebelumnya dan lakukan donasi kembali.'),
  	 		);
 		}

 		// set rules
		$rules = array(
	    	'user_id' 			=> 'required|exists:users,id',
	    	'currency'			=> 'required',
			'transferred_at'	=> 'required|numeric',
			'total'				=> 'required|numeric',
			'to_bank'			=> 'required|max:100',
			'bank_name'			=> 'required|max:40',
			'bank_account'		=> 'required|max:25',
			'bank_account_name'	=> 'required|max:40',
			'message'			=> '',
		);

		$validator = Validator::make($input, $rules);

  	  	if ($validator->fails())
  	  	{
  	 		// if fails
  	 		return array(
  	 			'success' => false,
  	 			'errors' => $validator->errors()->all(),
  	 		);
	    }
	    else
	    {
	    	// save to database
	    	$payment = new Payment;

	    	// set input
	    	foreach ($input as $field => $value)
	    	{
	    		$payment->$field = $value;
	    	}

	    	$payment->status = 0; // new (waiting approval)
	    	$payment->save();

	    	// update donation
	    	foreach ($donation_ids as $donation_id)
	    	{
	    		$donation = Donation::find($donation_id);
	    		$donation->payment_id = $payment->id;
	    		$donation->save();
	    	}

	    	// send email
	    	$payment = Payment::with(array('user', 'donations'))->find($payment->id);

	    	// set type for each donation
			foreach ($payment->donations as $donation)
			{
				$donation->setAppends(array('type'));
			}

			// send email to donor
			Newsletter::addPaymentNewsletter($payment);

	    	return array(
  	 			'success' => true,
  	 			'data' => $payment,
  	 		);
	    }
	}

	public static function approve($id)
	{
		$payment = Payment::with(array('user', 'donations'))->find($id);

		if ($payment == null)
		{
			return array(
  	 			'success' => false,
  	 			'errors' => array('Pembayaran tidak ditemukan.'),
  	 		);
		}

		if ($payment->status != 0)
		{
			return array(
  	 			'success' => false,
  	 			'errors' => array('Pembayaran sudah pernah direspon oleh admin sebelumnya.'),
  	 		);
		}

		// approve
		$payment->status = 1;
		$payment->save();

		// update donation
		Donation::where('payment_id', '=', $payment->id)->update(array('status' => 1));

		// get all donations
		$donations = Donation::with(array('user'))->where('payment_id', '=', $payment->id)->get();
		
		foreach ($donations as $donation)
		{
			// update donation
			$donation->status = 1;
			$donation->save();
			
			// get social target / social action
			$donation->setAppends(array('type'));

			// update total donation in social target / social action
			if (isset($donation->type->social_action_category_id))
			{
				$social_action = SocialAction::find($donation->type->id);
				$social_action->total_donation = $social_action->total_donation + $donation->total;
				$social_action->save();
			}
			else if (isset($donation->type->social_target_category_id))
			{
				$social_target = SocialTarget::find($donation->type->id);
				$social_target->total_donation = $social_target->total_donation + $donation->total;
				$social_target->save();
			}

			// send email to social creator / social action creator
			Newsletter::addDonationNewsletter($donation);
		}
		
		// set type for each donation
		foreach ($payment->donations as $donation)
		{
			$donation->setAppends(array('type'));
		}

		// send email to donor
		Newsletter::addPaymentNewsletter($payment);

		return array(
 			'success' => true,
 			'data' => $payment,
 		);
	}

	public static function reject($id)
	{
		$payment = Payment::with(array('user', 'donations'))->find($id);

		if ($payment == null)
		{
			return array(
  	 			'success' => false,
  	 			'errors' => array('Pembayaran tidak ditemukan.'),
  	 		);
		}

		if ($payment->status != 0)
		{
			return array(
  	 			'success' => false,
  	 			'errors' => array('Pembayaran sudah pernah direspon oleh admin sebelumnya.'),
  	 		);
		}

		// delete
		// $payment->delete();
		$payment->status = 2;
		$payment->save();

		// update donation
		Donation::where('payment_id', '=', $payment->id)->update(array('status' => 0, 'payment_id' => NULL));

		// set type for each donation
		foreach ($payment->donations as $donation)
		{
			$donation->setAppends(array('type'));
		}

		// send email to donor
		Newsletter::addPaymentNewsletter($payment);

		return array(
 			'success' => true,
 			'data' => $payment,
 		);
	}
}