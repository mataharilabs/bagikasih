@extends('admin.layouts.default')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Edit Data with ID {{ $data->id }}</h3>				
			</div><!-- /.box-header -->
			<div class="box-body">
				@if(count($errors))
					<div class="alert alert-warning">
					@foreach($errors->all() as $err)
					<p>{{ $err }}</p>	
					@endforeach
					</div>
				@endif				
				{{ Form::open(['route'=> 'admin.user.update.post']) }}				
				{{ Form::hidden('id', $data->id )}}
				<div class="form-group">
					{{ Form::label('city', 'City') }}
					{{ Form::select('city', $options, $data->city_id, ['class'=> 'form-control']) }}
				</div>				
				<div class="form-group">
					{{ Form::label('firstname', 'First Name') }}
					{{ Form::text('firstname', $data->firstname, ['class'=> 'form-control']) }}
				</div>				
				<div class="form-group">
					{{ Form::label('lastname', 'Last Name') }}
					{{ Form::text('lastname', $data->lastname, ['class'=> 'form-control']) }}
				</div>	
				<div class="form-group">
					{{ Form::label('description', 'Description') }}
					{{ Form::textarea('description', $data->description, ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('email', 'Email') }}
					{{ Form::text('email', $data->email, ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('password', 'New Password') }}
					{{ Form::password('password', ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('password_confirm', 'New Password Confirm') }}
					{{ Form::password('password_confirm', ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('phone', 'Phone Number') }}
					{{ Form::text('phone', $data->phone_number, ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('slug', 'Slug') }}
					{{ Form::text('slug', $data->slug, ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('birthday', 'Birthday') }}
					{{ Form::text('birthday', $data->birthday, ['class'=> 'form-control']) }}
				</div>	
				<div class="form-group">
					{{ Form::label('celebrity', 'Celebrity ?')}}
					<div class="radio">
						<label>{{ Form::radio('celebrity','0', $data->is_celebrity == 0? true : false,['class' => 'radio']) }} No</label>
						<label>{{ Form::radio('celebrity','1', $data->is_celebrity == 1? true : false,['class' => 'radio']) }} Yes</label>
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('social_target', 'My Social Target Subscriber ?')}}
					<div class="radio">
						<label>{{ Form::radio('social_target','0', $data->is_my_social_target_subscriber == 0? true : '',['class' => 'radio']) }} No</label>
						<label>{{ Form::radio('social_target','1', $data->is_my_social_target_subscriber == 1? true : '',['class' => 'radio']) }} Yes</label>
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('social_action', 'Social Action Subscriber ?')}}
					<div class="radio">
						<label>{{ Form::radio('social_action','0', $data->is_my_social_target_subscriber == 0? true : '',	['class' => 'radio']) }} No</label>
						<label>{{ Form::radio('social_action','1', $data->is_my_social_target_subscriber == 1? true : '',['class' => 'radio']) }} Yes</label>
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('newsletter_subscriber', 'Newsletter Subscriber ?')}}
					<div class="radio">
						<label>{{ Form::radio('newsletter_subscriber','0', $data->is_newsletter_subscriber == 0? true : '',['class' => 'radio']) }} No</label>
						<label>{{ Form::radio('newsletter_subscriber','1', $data->is_newsletter_subscriber == 1? true : '',	['class' => 'radio']) }} Yes</label>
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('role', 'Role ?')}}
					<div class="radio">
						<label>{{ Form::radio('role','1', $data->role == 1? true : '',	['class' => 'radio']) }} Admin</label>
						<label>{{ Form::radio('role','2', $data->role == 2? true : '',	['class' => 'radio']) }} Celebrity</label>
						<label>{{ Form::radio('role','3', $data->role == 3? true : '',	['class' => 'radio']) }} The Other Guy</label>
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('status', 'Status')}}
					<div class="radio">
						<label>{{ Form::radio('status','0', $data->status == 0? true : '',['class' => 'radio']) }} Not Active</label>
						<label>{{ Form::radio('status','1',	$data->status == 1? true : '',	['class' => 'radio']) }} Active</label>
					</div>
				</div>
				<div class="form-group">
					{{ Form::submit('Save', ['class' => 'btn btn-info']) }} <a href="{{ route('admin.user')}}" class="btn btn-default">Cancel</a>
				</div>
				{{ Form::close() }}
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
@stop