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

	public static function add($input)
	{
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

	    	// get payment ids
	    	$donation_ids = explode(',', $input['donation_ids']);
	    	unset($input['donation_ids']);

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