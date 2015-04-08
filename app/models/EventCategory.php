<?php

class EventCategory extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'event_categories';	


	public function getbyStatus() {
		$check = EventCategory::where('status',1)->count();
		return $check;
		if($check < 1){
			return false;
		}
		else{
			return EventCategory::where('status',1)->get();
		}
	}
}