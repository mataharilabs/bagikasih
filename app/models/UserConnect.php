<?php

class UserConnect extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_connects';

	public function user()
	{
		return $this->belongsTo('User');
	}
}