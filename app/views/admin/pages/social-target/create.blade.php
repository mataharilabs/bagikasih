@extends('admin.layouts.default')

@section('content')


{{ HTML::style('multiupload/css/uploadfilemulti.css'); }}
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
					{{ Form::text('id',count($social_target) > 0 ? $social_target->id : '',['class'=> 'form-control']) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('Kategori Target Sosial', 'Kategori Target Sosial')}}
					<select class="form-control" name="social_target_category_id">
						@foreach($social_target_category as $social_target_categorys):
                        	<option value="{{ $social_target_categorys->id }}"
                        		{{ count($social_target) > 0 && $social_target->social_target_category_id == $social_target_categorys->id ? 'selected' : '' }}>
                        		{{ $social_target_categorys->name }}
                        	</option>
                        @endforeach
                    </select>
				</div>

				<div class="form-group">
					{{ Form::label('Pengguna', 'Pengguna')}}
					<select class="form-control" name="user_id">
						@foreach($user as $users):
                        	<option value="{{ $users->id }}" {{ count($social_target) > 0 && $social_target->user_id == $users->id ? 'selected' : '' }}>
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
                        		{{ count($social_target) > 0 && $social_target->city_id == $citys->id ? 'selected' : '' }}>
                        		{{ $citys->name }}
                        	</option>
                        @endforeach
                    </select>
				</div>

				<div class="form-group">
					{{ Form::label('Nama Target Sosial', 'Nama Target Sosial')}}
					{{ Form::text('name',count($social_target) > 0 ? $social_target->name : '',['class'=> 'form-control','placeholder' => 'Nama Target Sosial']) }}
				</div>

				<div class="form-group">
					{{ Form::label('Deskripsi Target Sosial', 'Deskripsi Target Sosial')}}
					{{ Form::textarea('description',count($social_target) > 0 ? $social_target->description : '',['class'=> 'form-control','placeholder' => 'Deskripsi Target Sosial']) }}
				</div>


				<div class="form-group">
					{{ Form::label('Kepengurusan Target Sosial', 'Kepengurusan Target Sosial')}}
					{{ Form::textarea('stewardship',count($social_target) > 0 ? $social_target->stewardship : '',['class'=> 'form-control','placeholder' => 'Kepengurusan Target Sosial']) }}
				</div>

				<div class="form-group">
					{{ Form::label('Alamat Target Sosial', 'Alamat Target Sosial')}}
					{{ Form::text('address',count($social_target) > 0 ? $social_target->address : '',['class'=> 'form-control','placeholder' => 'Alamat Target Sosial']) }}
				</div>


				<div class="form-group">
					{{ Form::label('No. Telp', 'No. Telp')}}
					{{ Form::text('phone_number',count($social_target) > 0 ? $social_target->phone_number : '',['class'=> 'form-control','placeholder' => 'Email']) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('Email', 'Email')}}
					{{ Form::text('email',count($social_target) > 0 ? $social_target->total_donation_target : '',['class'=> 'form-control','placeholder' => 'Email']) }}
				</div>



				<div class="form-group">
					{{ Form::label('Alamat Sosial Media', 'Alamat Sosial Media')}}
					{{ Form::text('social_media_urls',count($social_target) > 0 ? $social_target->total_donation_target : '',['class'=> 'form-control','placeholder' => 'Alamat Sosial Media']) }}
				</div>

				<div class="form-group">
					{{ Form::label('Deksripsi Akun Bank Penyelenggara', 'Deksripsi Akun Bank Penyelenggara')}}
					{{ Form::textarea('bank_account_description',count($social_target) > 0 ? $social_target->bank_account_description : '',['class'=> 'form-control','placeholder' => 'Deskripsi Akun Bank Penyelenggara']) }}
				</div>

				<div class="form-group">
					{{ Form::label('Matauang', 'Matauang')}}
					<div class="radio">
						<!-- <label>{{ Form::radio('currency','USD',count($social_target) > 0 && $social_target->currency == 'USD' ? true : '',['class' => 'radio']) }} USD</label> -->
						<label>{{ Form::radio('currency','IDR',count($social_target) > 0 && $social_target->currency == 'IDR' ? true : '',['class' => 'radio']) }} IDR</label>
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('status', 'Status')}}
					<div class="radio">
						<label>{{ Form::radio('status','0',count($social_target) > 0 && $social_target->status == 0 ? true : '',['class' => 'radio']) }} Not Active</label>
						<label>{{ Form::radio('status','1',count($social_target) > 0 && $social_target->status == 1 ? true : '',['class' => 'radio']) }} Active</label>
					</div>
				</div>

				<div class="form-group">
						{{ Form::label('Cover Aksi Sosial', 'Cover Aksi Sosial')}}
						{{ Form::file('cover_photo_id') }}
					</div>

					<div id="image">Upload Image</div>

					<div id="status"></div>
					<script type="text/javascript">
						var base_url = '{{ URL::to('/') }}';
					</script>
					{{ HTML::script('multiupload/js/uploadmulti.js'); }}

				<br />
				
				<div class="form-group">
					{{ Form::submit('Save', ['class' => 'btn btn-info']) }} <a href="{{ route('admin.country')}}" class="btn btn-default">Cancel</a>
				</div>
				@if (count($social_target))
				<div class="box-body" id="voley">
					<table id="datatable" class="table table-bordered table-striped">
						<tbody>
							<tr>
								<th>Foto Utama</th>
								<td id="setphoto"><img src="{{ url('photos') }}/{{ $social_target->default_photo_id ? $social_target->default_photo_id : 'default' }}.jpg" class="img-polaroid img-rounded" style="max-width:150px;height:auto;"></td>
							</tr>
							<tr>
								<th>Foto Banner</th>
								<td><img src="{{ url('photos') }}/{{ $social_target->cover_photo_id ? $social_target->cover_photo_id : 'default-cover' }}.jpg" class="img-polaroid img-rounded" style="max-width:600px;height:auto;"></td>
							</tr>
						
						</tbody>
					</table>
				</div><!-- /.box-body -->
				@include('admin.pages.photo.multiphoto')
				<div class="modal" id="modal_no_head" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-body" align="center">
                                        <span style="font-size:19px;"><b>Apa yang anda inginkan pada gambar ini ?</b></span>
                                      </div>
                                        <div class="thumb" id="isiPhoto">
                                        	
                                        </div>
                                      <div class="modal-footer">
                                         <button type="button" id="delImages" data-del="" class="btn btn-success" data-dismiss="modal">Set Photo</button>
                                         <button type="button" id="delPhoto" data-del="" class="btn btn-danger" data-dismiss="modal">Hapus</button>
                                      </div>
                                    </div>
                                  </div>
                      </div>
                     <script type="text/javascript">
						var base_url = "{{ URL::to('') }}/social-target/setphoto?id={{ $social_target->id }}&image=";
						var del_url = "{{ URL::to('') }}/social-target/dropphoto?id=";
					</script>
					{{ HTML::script('multiupload/js/gambarDefault.js'); }}
				@endif
				{{ Form::close() }}

			</div><!-- /.box-body -->

		</div><!-- /.box -->
	</div>
</div>
@stop

<script type="text/javascript">
	$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
</script>