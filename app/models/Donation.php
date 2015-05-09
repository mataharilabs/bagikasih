<?php

class Donation extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'donations';
	/**
	 * undocumented class variable
	 *
	 * @var string
	 **/
	protected $fillable = ['user_id', 'type_name', 'type_id', 'currency', 'total', 'message', 'as_noname', 'created_atp'];

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

	    	// send invoice email
	    	Newsletter::addInvoiceNewsletter($donation);

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

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function addNew(array $input)
	{
		return Donation::create($input);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function edit(array $input)
	{				
		$data 				= Donation::findOrFail($input['id']);
		$data->name 		= $input['name'];
		$data->country_id	= $input['country_id'];
		$data->status 		= $input['status'];
		return $data->save();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function remove($id)
	{
		$data = Donation::findOrFail($id);		
		return $data->delete();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function optionsUser()
	{
		return User::where('status',1)->lists('firstname', 'id');
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function optionsPayment()
	{
		return User::where('status',1)->lists('firstname', 'id');
	}
	
}