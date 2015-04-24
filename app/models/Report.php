<?php

class Report extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $guarded = array('id');  // Important

	protected $table = 'reports';

	public function user()
	{
		return $this->belongsTo('User','user_id');
	}

	public function event()
	{
		return $this->belongsTo('Events','type_id');
	}


	public function socialaction()
	{
		return $this->belongsTo('SocialAction','type_id');
	}

	public function socialtarget()
	{
		return $this->belongsTo('SocialTarget','type_id');
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

	public static function createReport($input){	

		$rules =  array(
			'message' => 'required|min:10',
			'subject_code' => 'required',
			'type_name' => 'required',
			'type_id' => 'required',
			// 'status' => 'required',
		 );

		$validator = Validator::make($input, $rules);

  	  	if ($validator->fails()) {
  	 		return $validator->errors()->all();
	    } 
	    else {
	    	try {
	    		$report = new Report;
	   	 		$report->fill($input);
	    		$report->save();
	    		return "ok";
	    	} catch (Exception $e) {
	    		return "no";
	    	}
	    }

	}

}