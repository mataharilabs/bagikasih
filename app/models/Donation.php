<?php

class Donation extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'donations';

	public function user()
	{
		return $this->belongsTo('User');
	}

	/**
	 * Get Type
	 *
	 * @return array
	 */
	public function getTypeAttribute()
	{
		$type = DB::table($this->type_name)
					->where('id', $this->type_id)
					->first();
		
		return $type;
	}

	public static function add($input)
	{
 		// set rules
		$rules = array(
	    	'user_id' 	=> 'required|exists:users,id',
	    	'type_name' => 'required|in:social_targets,social_actions',
	    	'type_id' 	=> 'required|integer',
	    	'currency'	=> 'required',
			'total'		=> 'required|numeric',
			'message'	=> '',
			'as_noname'	=> 'sometimes',
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
	    	$donation = new Donation;

	    	// set input
	    	foreach ($input as $field => $value)
	    	{
	    		$donation->$field = $value;
	    	}

	    	$donation->status = 0; // new (waiting approval)
	    	$donation->save();

	    	// TODO : send email

	    	return array(
  	 			'success' => true,
  	 			'data' => $donation,
  	 		);
	    }
	}

	public static function generateDonationCode($donation_id)
	{
		$donation_code = date('Y').date('m').date('d').$donation_id;

		return $donation_code;
	}

	public static function getDonationId($donation_code)
	{
		$donation_id = substr($donation_code, 8);

		return $donation_id;
	}

	
}