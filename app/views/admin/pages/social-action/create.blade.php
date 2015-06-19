@extends('admin.layouts.default')

@section('content')
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
					{{ Form::text('id',count($social_action) > 0 ? $social_action->id : '',['class'=> 'form-control']) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('Target Sosial', 'Target Sosial')}}
					<select class="form-control" name="social_target_id">
						@foreach($social_target as $social_targets)
                        	<option value="{{ $social_targets->id }}"
                        		{{ count($social_action) > 0 && $social_action->social_target_id == $social_targets->id ? 'selected' : '' }}>
                        		{{ $social_targets->name }}
                        	</option>
                        @endforeach
                    </select>
				</div>


				<div class="form-group">
					{{ Form::label('Aksi Sosial', 'Aksi Sosial')}}
					<select class="form-control" name="social_action_category_id">
						@foreach($social_action_category as $social_action_categorys):
                        	<option value="{{ $social_action_categorys->id }}" 
                        		{{ count($social_action) > 0 && $social_action->social_action_category_id == $social_action_categorys->id ? 'selected' : '' }}>
                        		{{ $social_action_categorys->name }}
                        	</option>
                        @endforeach
                    </select>
				</div>


				<div class="form-group">
					{{ Form::label('Pengguna', 'Pengguna')}}
					<select class="form-control" name="user_id">
						@foreach($user as $users):
                        	<option value="{{ $users->id }}" {{ count($social_action) > 0 && $social_action->user_id == $users->id ? 'selected' : '' }}>
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
                        		{{ count($social_action) > 0 && $social_action->city_id == $citys->id ? 'selected' : '' }}>
                        		{{ $citys->name }}
                        	</option>
                        @endforeach
                    </select>
				</div>

				<div class="form-group">
					{{ Form::label('Default Photo', 'Default Photo')}}
					{{ Form::file('default_photo_id') }}
				</div>

				<div class="form-group">
					{{ Form::label('Cover Aksi Sosial', 'Cover Aksi Sosial')}}
					{{ Form::file('cover_photo_id') }}
				</div>

				<div class="form-group">
					{{ Form::label('Nama Aksi Sosial', 'Nama Aksi Sosial')}}
					{{ Form::text('name',count($social_action) > 0 ? $social_action->name : '',['class'=> 'form-control','placeholder' => 'Nama Aksi Sosial']) }}
				</div>

				<div class="form-group">
					{{ Form::label('Deskripsi Aksi Sosial', 'Deskripsi Aksi Sosial')}}
					{{ Form::textarea('description',count($social_action) > 0 ? $social_action->description : '',['class'=> 'form-control','placeholder' => 'Deskripsi Aksi Sosial']) }}
				</div>


				<div class="form-group">
					{{ Form::label('Kepengurusan Aksi Sosial', 'Kepengurusan Aksi Sosial')}}
					{{ Form::textarea('stewardship',count($social_action) > 0 ? $social_action->stewardship : '',['class'=> 'form-control','placeholder' => 'Kepengurusan Aksi Sosial']) }}
				</div>

				<div class="form-group">
					{{ Form::label('Deksripsi Akun Bank Penyelenggara', 'Deksripsi Akun Bank Penyelenggara')}}
					{{ Form::textarea('bank_account_description',count($social_action) > 0 ? $social_action->bank_account_description : '',['class'=> 'form-control','placeholder' => 'Deskripsi Akun Bank Penyelenggara']) }}
				</div>

				<div class="form-group">
					{{ Form::label('Matauang', 'Matauang')}}
					<div class="radio">
						<label>{{ Form::radio('currency','USD',count($social_action) > 0 && $social_action->currency == 'USD' ? true : '',['class' => 'radio']) }} USD</label>
						<label>{{ Form::radio('currency','IDR',count($social_action) > 0 && $social_action->currency == 'IDR' ? true : '',['class' => 'radio']) }} IDR</label>
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('Membutuhkan donasi sebesar', 'Membutuhkan donasi sebesar')}}
					{{ Form::text('total_donation_target',count($social_action) > 0 ? $social_action->total_donation_target : '',['class'=> 'form-control','placeholder' => 'Membutuhkan donasi sebesar']) }}
				</div>

				<div class="form-group">
					{{ Form::label('Berakhir Pada', 'Berakhir Pada')}}
		                <div class="input-group date" id="start_date">
						  {{ Form::text('expired_at',count($social_action) > 0 ? $social_action->expired_at : '',['class'=> 'form-control','id'=> 'start_date','placeholder' => 'Berakhir Pada']) }}
		                  <!-- <input type="text" class="form-control" name="expired_at" placeholder="Berakhir Pada"> -->
		                  <span class="input-group-addon">
		                  <span class="fa fa-calendar fa-fw"></span>
		                  </span>
		                </div>
				</div>


				<div class="form-group">
					{{ Form::label('status', 'Status')}}
					<div class="radio">
						<label>{{ Form::radio('status','0',count($social_action) > 0 && $social_action->status == 0 ? true : '',['class' => 'radio']) }} Not Active</label>
						<label>{{ Form::radio('status','1',count($social_action) > 0 && $social_action->status == 1 ? true : '',['class' => 'radio']) }} Active</label>
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
    $('#start_date').datetimepicker();
  });
  </script>

@stop

