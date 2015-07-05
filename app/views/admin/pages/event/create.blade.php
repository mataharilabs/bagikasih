@extends('admin.layouts.default')

@section('content')


{{ HTML::style('multiupload/css/uploadfilemulti.css'); }}
<!-- {{ HTML::script('multiupload/js/jquery-1.8.0.min.js'); }} -->
{{ HTML::script('multiupload/js/jquery.fileuploadmulti.min.js'); }}
<div class="row">
    <div class="col-xs-12 col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Tambah Aksi Sosial Baru</h3>				
			</div><!-- /.box-header -->
			<div class="box-body">
				@if(Session::has('validasi'))
					<div class="alert alert-danger">
					@foreach(Session::get('validasi') as $err)
					<p>{{ $err }}</p>	
					@endforeach
					</div>
				@endif				
							
			
				{{ Form::open(['route'=> $action,'files' => true]) }}


				<div class="form-group hide">
					{{ Form::label('ID', 'ID')}}
					{{ Form::text('id',count($event) > 0 ? $event->id : '',['class'=> 'form-control']) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('Kategori Event', 'Kategori Event')}}
					<select class="form-control" name=" event_category_id">
						@foreach($event_category as $event_categorys):
                        	<option value="{{ $event_categorys->id }}"
                        		{{ count($event) > 0 && $event->event_category_id == $event_categorys->id ? 'selected' : '' }}>
                        		{{ $event_categorys->name }}
                        	</option>
                        @endforeach
                    </select>
				</div>

				<div class="form-group">
					{{ Form::label('Pengguna', 'Pengguna')}}
					<select class="form-control" name="user_id">
						@foreach($user as $users):
                        	<option value="{{ $users->id }}" {{ count($event) > 0 && $event->user_id == $users->id ? 'selected' : '' }}>
                        		{{ $users->firstname.' '.$users->lastname }}
                        	</option>
                        @endforeach
                    </select>
				</div>


				<div class="form-group">
					{{ Form::label('Kota Asal', 'Kota Asal')}}
					<select class="form-control" name="city_id">
						@foreach($city as $citys):
                        	<option value="{{ $citys->id }}" 
                        		{{ count($event) > 0 && $event->city_id == $citys->id ? 'selected' : '' }}>
                        		{{ $citys->name }}
                        	</option>
                        @endforeach
                    </select>
				</div>


				<div class="form-group">
					{{ Form::label('Nama Event', 'Nama Event')}}
					{{ Form::text('name',count($event) > 0 ? $event->name : '',['class'=> 'form-control','placeholder' => 'Nama Event']) }}
				</div>

				<div class="form-group">
					{{ Form::label('Deskripsi Event', 'Deskripsi Event')}}
					{{ Form::textarea('description',count($event) > 0 ? $event->description : '',['class'=> 'form-control','placeholder' => 'Deskripsi Event']) }}
				</div>


				<div class="form-group">
					{{ Form::label('Kepengurusan Event', 'Kepengurusan Event')}}
					{{ Form::textarea('stewardship',count($event) > 0 ? $event->stewardship : '',['class'=> 'form-control','placeholder' => 'Kepengurusan Event']) }}
				</div>

				<div class="form-group">
					{{ Form::label('Lokasi Event', 'Lokasi Event')}}
					{{ Form::text('location',count($event) > 0 ? $event->location : '',['class'=> 'form-control','placeholder' => 'Lokasi Event']) }}
				</div>

				<div class="form-group">
					{{ Form::label('Email', 'Email')}}
					{{ Form::text('email',count($event) > 0 ? $event->email : '',['class'=> 'form-control','placeholder' => 'Email']) }}
				</div>

				<div class="form-group">
					{{ Form::label('Website', 'Website')}}
					{{ Form::text('website_url',count($event) > 0 ? $event->website_url : '',['class'=> 'form-control','placeholder' => 'Website']) }}
				</div>


				<div class="form-group">
					{{ Form::label('Alamat Sosial Media', 'Alamat Sosial Media')}}
					{{ Form::text('social_media_urls',count($event) > 0 ? $event->social_media_urls : '',['class'=> 'form-control','placeholder' => 'Alamat Sosial Media']) }}
				</div>


				<div class="form-group">
					{{ Form::label('Mulai Pada', 'Mulai Pada')}}
		                <div class="input-group date" id="started_date">
						  {{ Form::text('ended_at',count($event) > 0 ? date('m/d/y h:m',$event->started_at) : '',['class'=> 'form-control','id'=> 'start_date','placeholder' => 'Mulai Pada']) }}
		                  <!-- <input type="text" class="form-control" name="expired_at" placeholder="Berakhir Pada"> -->
		                  <span class="input-group-addon">
		                  <span class="fa fa-calendar fa-fw"></span>
		                  </span>
		                </div>
				</div>

				<div class="form-group">
					{{ Form::label('Berakhir Pada', 'Berakhir Pada')}}
		                <div class="input-group date" id="ended_date">
						  {{ Form::text('started_at',count($event) > 0 ? date('m/d/y h:m',$event->ended_at) : '',['class'=> 'form-control','id'=> 'start_date','placeholder' => 'Berakhir Pada']) }}
		                  <!-- <input type="text" class="form-control" name="expired_at" placeholder="Berakhir Pada"> -->
		                  <span class="input-group-addon">
		                  <span class="fa fa-calendar fa-fw"></span>
		                  </span>
		                </div>
				</div>

					

<!-- 				<div class="form-group">
					{{ Form::label('Default Photo', 'Default Photo')}}
					{{ Form::file('default_photo_id') }}
				</div>
 -->
				
					<div class="form-group">
						{{ Form::label('Cover Event', 'Cover Event')}}
						{{ Form::file('cover_photo_id') }}
					</div>

					<div id="image">Upload Image</div>

					<div id="status"></div>
	
					<script>

					$(document).ready(function()
					{
						var settings = {
							url: "upload.php",
							method: "POST",
							// allowedTypes:"jpg,png,gif,doc,pdf,zip",
							allowedTypes:"jpg",
							fileName: "myfile",
							multiple: true,
							onSuccess:function(files,data,xhr)
							{
								$("#status").html("<font color='green'>Upload is success</font>");
								
							},
						    afterUploadAll:function()
						    {
						        $("#status").hide();
						        // alert("all images uploaded!!");
						    },
							onError: function(files,status,errMsg)
							{		
								$("#status").html("<font color='red'>Upload is Failed</font>");
						        $("#status").hide();
							}
						}
						$("#image").uploadFile(settings);
					});

					</script>

					<br />

				<div class="form-group">
					{{ Form::label('status', 'Status')}}
					<div class="radio">
						<label>{{ Form::radio('status','0',count($event) > 0 && $event->status == 0 ? true : '',['class' => 'radio']) }} Not Active</label>
						<label>{{ Form::radio('status','1',count($event) > 0 && $event->status == 1 ? true : '',['class' => 'radio']) }} Active</label>
					</div>
				</div>


				<div class="form-group">
					{{ Form::submit('Save', ['class' => 'btn btn-info']) }} <a href="{{ route('admin.country')}}" class="btn btn-default">Cancel</a>
				</div>
				{{ Form::close() }}
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
<script type="text/javascript">
  $(function () {
    $('#started_date').datetimepicker();
    $('#ended_date').datetimepicker();
  });
  </script>
@stop
