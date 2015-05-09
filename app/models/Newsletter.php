<?php

class Newsletter extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'newsletters';
	/**
	 * undocumented class variable
	 *
	 * @var string
	 **/
	protected $fillable = ['user_id', 'type', 'sender_email', 'sender_name', 'recipient_name', 'recipient_email', 'subject', 'message', 'status'];

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
		// set subject
		$input['subject'] = '[BagiKasih] ' . $input['subject'];

		// set sender
		$input['sender_email'] = 'info@bagikasih.com';
		$input['sender_name'] = 'BagiKasih';

		// set status
		$input['status'] = 0;

		$newsletter = new Newsletter;

		foreach ($input as $coulumn => $value)
		{
			$newsletter->$coulumn = $value;
		}

		$newsletter->save();
		
		try
		{
			$data = array('content' => $newsletter->message);

			if ( ! App::isLocal())
			{
				// send email
				Mail::send('emails.blank', $data, function($message) use($newsletter)
				{
					$message->from($newsletter->sender_email, $newsletter->sender_name);
					$message->to($newsletter->recipient_email, $newsletter->recipient_name);
					$message->subject($newsletter->subject);
				});
			}
			else
			{
				// echo View::make('emails.blank', $data);
			}

			$newsletter->status = 1;
    		$newsletter->save();

		} catch (Exception $e) {
    		$newsletter->status = 2;
    		$newsletter->save();
    	}

    	return $newsletter;
	}
	
	public static function addDonationNewsletter($donation)
	{
		// init
		$is_subscriber = false;

		// get creator
		$creator = User::find($donation->type->user_id);

		if (isset($donation->type->social_action_category_id))
		{
			// type
			$type = 2;
			$type_name = 'social_action';

			if ($creator->is_my_social_action_subscriber) $is_subscriber = true;
		}
		else if (isset($donation->type->social_target_category_id))
		{
			// type
			$type = 1;
			$type_name = 'social_target';

			if ($creator->is_my_social_target_subscriber) $is_subscriber = true;
		}

		if ($is_subscriber)
		{
			// send email
			// get recipient data
			$recipient_name = $creator->firstname.' '.$creator->lastname;

			// create nid
			$nid = self::createNID();

			// subject
			$subject = 'Seseorang memberi donasi ke ' . $donation->type->name;

			// set data for message
			$data = array(
				'nid' => $nid,
				'recipient_name' => $recipient_name,
				'donation' => $donation,
			);

			// message
			$message = View::make('emails.'.$type_name.'_donation_info', $data);
			
			$input = array(
				'user_id' 			=> $creator->id,
				'type'	 			=> $type,
				'recipient_email'	=> $creator->email,
				'recipient_name'	=> $recipient_name,
				'subject'			=> $subject,
				'message'			=> $message,
				'nid'				=> $nid,
			);

			return self::add($input);
		}
	}

	public static function addInvoiceNewsletter($donation)
	{
		// get creator
		$creator = User::find($donation->user_id);

		// type
		$type = 0;

		// create nid
		$nid = self::createNID();

		// subject
		$subject = 'Invoice untuk donasi Anda';

		// get recipient data
		$recipient_name = $creator->firstname.' '.$creator->lastname;

		// set data for message
		$data = array(
			'nid' => $nid,
			'recipient_name' => $recipient_name,
			'donation' => $donation,
		);

		// message
		$message = View::make('emails.invoice', $data);
		
		$input = array(
			'user_id' 			=> $creator->id,
			'type'	 			=> $type,
			'recipient_email'	=> $creator->email,
			'recipient_name'	=> $recipient_name,
			'subject'			=> $subject,
			'message'			=> $message,
			'nid'				=> $nid,
		);

		return self::add($input);
	}

	public static function addPaymentNewsletter($payment)
	{
		// type
		$type = 0;

		// create nid
		$nid = self::createNID();

		// subject
		if ($payment->status == 0) $subject = 'Terima kasih untuk konfirmasi pembayaran donasinya';
		else if ($payment->status == 1) $subject = 'Donasi Anda telah kami terima';
		else if ($payment->status == 2) $subject = 'Konfirmasi pembayaran dibatalkan';

		// get recipient data
		$recipient_name = $payment->user->firstname.' '.$payment->user->lastname;

		// set data for message
		$data = array(
			'nid' => $nid,
			'recipient_name' => $recipient_name,
			'subject' => $subject,
			'payment' => $payment,
		);

		// message
		$message = View::make('emails.payment_confirmation', $data);
		
		$input = array(
			'user_id' 			=> $payment->user->id,
			'type'	 			=> $type,
			'recipient_email'	=> $payment->user->email,
			'recipient_name'	=> $recipient_name,
			'subject'			=> $subject,
			'message'			=> $message,
			'nid'				=> $nid,
		);

		return self::add($input);
	}

	public static function createNID()
	{
		$nid = md5(mt_rand());

		return $nid;
	}
		/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function addNew(array $input)
	{
		return Newsletter::create($input);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function edit(array $input)
	{				
		$data 					= Newsletter::findOrFail($input['id']);
		$data->id 				= $input['id'];
		$data->user_id			= $input['user_id']; 
		$data->type				= $input['type'];
		$data->sender_email		= $input['sender_email']; 
		$data->sender_name		= $input['sender_name'];
		$data->recipient_email	= $input['recipient_email']; 
		$data->recipient_name	= $input['recipient_email'];
		$data->subject			= $input['subject']; 
		$data->message			= $input['message']; 
		$data->status			= $input['status'];		
		return $data->save();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function remove($id)
	{
		$data = Newsletter::findOrFail($id);		
		return $data->delete();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function optionsUser()
	{
		return User::lists('firstname', 'id');
	}
}