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

	    	// TODO : send email

	    	// 
	    	foreach ($donation_ids as $donation_id)
	    	{
	    		$donation = Donation::find($donation_id);
	    		$donation->payment_id = $payment->id;
	    		$donation->save();
	    	}

	    	return array(
  	 			'success' => true,
  	 			'data' => $payment,
  	 		);
	    }
	}
}