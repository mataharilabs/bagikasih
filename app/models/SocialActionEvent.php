<?php

class SocialActionEvent extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'social_action_events';

	public function socialAction()
	{
		return $this->belongsTo('SocialAction', 'social_action_id');
	}

	public function event()
	{
		return $this->belongsTo('Events', 'event_id');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}