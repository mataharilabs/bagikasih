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
}