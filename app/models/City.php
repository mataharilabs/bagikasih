<?php

class City extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cities';

	public function country()
	{
		return $this->belongsTo('Country');
	}

	public static function getAll()
	{
		return City::where('status',1)->get();
	}
}