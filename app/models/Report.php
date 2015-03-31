<?php

class Report extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reports';

	public function user()
	{
		return $this->belongsTo('User');
	}
}