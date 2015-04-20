<?php

class ReportController extends Controller {

	public function create(){
		$input = array(
			'user_id' => Auth::check() ? Auth::user()->id : 0,
			'message' => 'testing bro okeh',
			'subject_code' => 3,
			'type_name' => 'events',
			'type_id' => 1,
			'status' => 1,
		);

		$post = Report::createReport($input);

		if($post){
			Session::put('sukses','Terimakasih report dari anda sudah kami simpan ke dalam database kami.');
		}
		else{
			Session::put('gagal','Maaf proses report anda gagal di simpan di database kami');
		}
		
		return $post;
	}

}
