<?php

class AdminPhotoController extends AdminBaseController {

	/*
	|--------------------------------------------------------------------------
	| Photo Controller
	|--------------------------------------------------------------------------
	|
	| 
	|
	*/
	private $_menu = 'photos';


	/**
	 *
	 * @return fundamental <Ahadian Akbar@2015>
	 * @author rabkanaidaha@gmail.com 
	 **/
	
	public function multi() {

		$output_dir = public_path().'/photos/';

			if(isset($_FILES["myfile"])){
				$ret = array();
				$ret['status'] = 'error';

				$error = $_FILES["myfile"]["error"];
			   
		    	if(!is_array($_FILES["myfile"]['name'])) //single file
		    	{
		            $RandomNum = time();
		            $ImageName = str_replace(' ','-',strtolower($_FILES['myfile']['name']));
					
					$ext = pathinfo($_FILES['myfile']['name'],PATHINFO_EXTENSION);
		            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
		            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ext;

		            $post = new Photo;
				    $post->tmp 	         = Session::get('time');
				    $post->tmpname  	 = $NewImageName;
					$post->user_id  	 = Auth::user()->id;
				    $post->save();
					
					move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$post->id.'.'.$ext);
					$img = Image::make($output_dir.$post->id.'.'.$ext);
					
					if($ext!='jpg'){
						$img->encode('jpg',75);
						$img->save($output_dir.$post->id.'.jpg');
					}
		       	 	$img->fit(200);
		       	 	$img->save($output_dir.'thumb_'.$post->id.'.jpg');
					
					// Menghapus file lama setelah kita meng-convert-nya ke jpg
					if($ext!='jpg') unlink($output_dir.$post->id.'.'.$ext);
					$ret['status'] = 'success';
		    	} else {
		            $fileCount = count($_FILES["myfile"]['name']);
		    		for($i=0; $i < $fileCount; $i++){
		                $RandomNum = time();
						$ImageName = str_replace(' ','-',strtolower($_FILES['myfile']['name'][$i]));
						
						$ext = pathinfo($_FILES['myfile']['name'][$i],PATHINFO_EXTENSION);
						$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
						$NewImageName = $ImageName.'-'.$RandomNum.'.'.$ext;

						$post = new Photo;
						$post->tmp 	         = Session::get('time');
						$post->tmpname  	 = $NewImageName;
						$post->user_id  	 = Auth::user()->id;
						$post->save();
						
						move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$post->id.'.'.$ext);
						$img = Image::make($output_dir.$post->id.'.'.$ext);
						
						if($ext!='jpg'){
							$img->encode('jpg',75);
							$img->save($output_dir.$post->id.'.jpg');
						}
						$img->fit(200);
						$img->save($output_dir.'thumb_'.$post->id.'.jpg');
						
						// Menghapus file lama setelah kita meng-convert-nya ke jpg
						if($ext!='jpg') unlink($output_dir.$post->id.'.'.$ext);
						$ret['status'] = 'success';
		    		}
		    	}
			    echo json_encode($ret);
			 }
	}
	

	public function index()
	{
		// init
		$photo 	= Photo::orderBy('id', 'DESC')->get();

		$data 	= array(
			'menu'			=> 'Photo',
			'title' 		=> 'Photo',
			'description' 	=> '',
			'breadcrumb' 	=> array(
				'photo' 	=> route('admin.photo'),
			),
		);

		$data['data'] 		= $photo;

		return View::make('admin.pages.photo.index')
					->with($data);
	}

	public function show(Photo $data){
		$data 	= array(
			'menu'			=> 'Photo',
			'title' 		=> 'Photo',
			'description' 	=> '',
			'breadcrumb' 	=> array(
				'photo' 	=> route('admin.photo'),
			),
			'data'			=> $data,
		);
		return View::make('admin.pages.photo.show', $data);
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function create()
	{		
		$data = array(
			'menu' 	=> $this->_menu,
			'title' => 'Photo+',
			'description' 	=> '',
			'breadcrumb' 	=> array(
				'Social Target Category' 	=> route('admin.photo'),
			),
			'options'		=> [''=>'-- Choose --','social_targets' => 'Social Targets', 'social_actions' => 'Social Actions', 'events' => 'Events'],
		);

		return View::make('admin.pages.photo.create', $data);
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function store()
	{	
		$lokasi = public_path().'/photos/';
		$validator = $this->storeValid();
		if($validator->passes())
		{		
			$input 		= $this->storeInput();
			$photo 		= Photo::add($input);			
			$file 		= $_FILES['photo']['tmp_name'];
			// Extension
			$ext = pathinfo($_FILES["photo"]["name"],PATHINFO_EXTENSION);
			
			
			if($photo && move_uploaded_file($_FILES['photo']['tmp_name'],$lokasi.$photo->id.'.'.$ext)){
				$img 		= Image::make($lokasi.$photo->id.'.'.$ext);
				if($ext!='jpg'){
					$img->encode('jpg',75);
					$img->save($lokasi.$photo->id.'.jpg');
				}
				$img->fit(200);
				$img->save($lokasi.'thumb_'.$photo->id.'.jpg');
				
				// Menghapus file lama setelah kita meng-convert-nya ke jpg
				if($ext!='jpg') unlink($lokasi.$photo->id.'.'.$ext);
				
				return Redirect::route('admin.photo')->withStatuses(['add'=>'Tambah Berhasil!']);
			}	

			return Redirect::route('admin.photo.create')->withErrors(['add'=>'Tambah Gagal!'])->withInput();
		}

		return Redirect::route('admin.photo.create')->withErrors($validator)->withInput();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function storeInput()
	{
		return ['name'		=> Input::get('name'), 	
				'type_name' => Input::get('type_name'), 
				'type_id'	=> Input::get('type_id'),			
				'status' 	=> Input::get('status')];				
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function storeValid()
	{
		return Validator::make(Input::all(), [
			'name'		=> 'required', 
			'photo'		=> 'required|image',
			'type_name' => 'required', 
			'type_id'	=> 'required',
			'status'	=> 'required']);
	}

	public function update(Photo $photo)
	{		
		$data 		= array(
			'menu' 				=> $this->_menu,
			'title' 			=> 'Photo+',
			'description' 		=> '',
			'breadcrumb' 		=> array(
				'Photo' 		=> route('admin.photo')			
			),			
			'data' 				=> $photo,			
			'options'			=> [
				''				 => '-- Choose --',
				'social_targets' => 'Social Targets', 
				'social_actions' => 'Social Actions', 
				'events' 		 => 'Events'],		
		);

		return View::make('admin.pages.photo.edit', $data);
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function updateDo()
	{
		$validator = $this->updateValid();
		if($validator->passes())
		{
			$input = $this->updateInput();
			
			$save  = Photo::edit($input);			
			if($save)
			{
				return Redirect::route('admin.photo')->withStatuses(['edit'=> 'Data Berhasil di edit!']);
			}
			return Redirect::route('admin.photo')->withErrors(['edit'=> 'Data Gagal di edit!']);
		}
		return Redirect::back()->withErrors($validator)->withInput();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function updateInput()
	{
		return ['id'		=> Input::get('id'), 
				'name'		=> Input::get('name'), 	
				'type_name' => Input::get('type_name'), 
				'type_id'	=> Input::get('type_id'),			
				'status' 	=> Input::get('status')];
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function updateValid()
	{
		return Validator::make(Input::all(), [
			'id'		=> 'required', 
			'name'		=> 'required', 			
			'type_name' => 'required',			
			'status'	=> 'required']);
	}

	public function delete(Photo $photo)
	{
		$data = array(
			'menu' 	=> $this->_menu,
			'title' => 'Photo+',
			'description' => '',
			'breadcrumb' => array(
				'Photo' => route('admin.photo')			
			),
			'data' 	=> $photo
		);
		return View::make('admin.pages.photo.delete', $data);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function deleteDo()
	{	
		$id = Input::get('id');
		$photo = Photo::remove($id);
		
		// Mengupdate semua fitur yang menggunakan foto menjadi 0
		Events::where('default_photo_id',$id)->update(['default_photo_id' => 0]);
		Events::where('cover_photo_id',$id)->update(['cover_photo_id' => 0]);
		
		SocialAction::where('default_photo_id',$id)->update(['default_photo_id' => 0]);
		SocialAction::where('cover_photo_id',$id)->update(['cover_photo_id' => 0]);
		
		SocialTarget::where('default_photo_id',$id)->update(['default_photo_id' => 0]);
		SocialTarget::where('cover_photo_id',$id)->update(['cover_photo_id' => 0]);
		
		if($photo){
			$lokasi = public_path().'/photos/';
			if(unlink($lokasi.$id.'.jpg') && unlink($lokasi.'thumb_'.$id.'.jpg')){
				return Redirect::route('admin.photo')->withStatuses(['delete' => 'Hapus Sukses']);	
			}
			return Redirect::route('admin.photo')->withErrors(['delete' => 'Delete File Gagal']);
		}
		return Redirect::route('admin.photo')->withErrors(['delete' => 'Delete File Gagal']);		
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	protected function deleteValid($id)
	{
		$exist =  Photo::isExist($id);
		if($exist)
		{
			return false;
		}
		return true;
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function ajax()
	{
		if(Request::ajax())
		{
			$type = Input::get('type_name');	
			$data =	['data'=> Photo::listId($type)];	
			return View::make('admin.pages.photo.ajax', $data);	
		}
		return 'Whoops! Not ajax Request';
	}	


}