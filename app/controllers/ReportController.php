<?php

class ReportController extends Controller {

	public function create(){
		$input = array(
			'user_id' => Auth::check() ? Auth::user()->id : 0,
			'message' => Input::get('message'),
			'subject_code' => Input::get('subject_code'),
			'type_name' => Input::get('type_name'),
			'type_id' => Input::get('type_id'),
		);

		$post = Report::createReport($input);

		if($post == 'ok'){
			Session::flash('sukses','Terimakasih report dari anda sudah kami simpan ke dalam database kami.');
		}
		else{
			Session::flash('gagal','Maaf proses report anda gagal di simpan di database kami');
		}
		
		return $post;
	}

}
