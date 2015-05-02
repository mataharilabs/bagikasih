<?php

class Newsletter extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'newsletters';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public static function getByNID($nid)
	{
		$newsletter = Newsletter::with(array('user'))->where('nid', '=', $nid)->first();

		return $newsletter;
	}

	public static function add($input)
	{

	}
	
	public static function addDonationNewsletter($donation)
	{
		return $donation;
		// get creator
		$creator = User::find($donation->type->user_id);

		// get recipient data
		$recipient_name = $creator->firstname.' '.$creator->lasy

		// create nid
		$nid = Newsletter::createNID();

		$data = array(
			'nid' => $nid,
			'recipient_name' => $recipient_name,
			'donation' => $donation,
		);

		if ($donation->type->social_action_category_id)
		{
			// message
			$message = View::make('emails.social_action_donation_info', $data);
		}
		else if ($donation->type->social_target_category_id)
		{
			// message
			$message = View::make('emails.social_target_donation_info', $data);
		}
		
		echo $message;	
	}

	public static function createNID()
	{
		$nid = md5(mt_rand());

		return $nid;
	}
}