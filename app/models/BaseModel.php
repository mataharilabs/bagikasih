<?php

use Illuminate\Database\Eloquent\Collection;

class BaseModel extends Eloquent {

	/**
	 * Maintain the timestamps fields
	 * @var bool
	 */
	public $timestamps = true;

	/**
   * Get a fresh timestamp for the model.
   *
   * @return (int) timestamp
   */
	public function freshTimestamp()
	{
		return time();
	}


	// Uncomment, if you don't want Carbon API on SELECTs
	// protected function asDateTime($value)
	// {
	//   return $value;
	// }

	/**
	* Reset the format for database stored dates to Unix Timestamp
	*
	* @return string
	*/
	public function getDateFormat()
	{
		return 'U'; // PHP date() Seconds since the Unix Epoch
	}
}