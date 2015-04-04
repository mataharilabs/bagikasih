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

	public function city()
	{
		return $this->belongsTo('City');
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
}