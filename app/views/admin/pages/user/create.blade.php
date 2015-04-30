@extends('admin.layouts.default')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Tambah Data Baru</h3>				
			</div><!-- /.box-header -->
			<div class="box-body">
				@if(count($errors))
					<div class="alert alert-warning">
					@foreach($errors->all() as $err)
					<p>{{ $err }}</p>	
					@endforeach
					</div>
				@endif				
				{{ Form::open(['route'=> 'admin.user.store']) }}				
				<div class="form-group">
					{{ Form::label('firstname', 'First Name') }}
					{{ Form::text('firstname', '', ['class'=> 'form-control']) }}
				</div>				
				<div class="form-group">
					{{ Form::label('lastname', 'Last Name') }}
					{{ Form::text('lastname', '', ['class'=> 'form-control']) }}
				</div>	
				<div class="form-group">
					{{ Form::label('description', 'Description') }}
					{{ Form::textarea('description', '', ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('email', 'Email') }}
					{{ Form::text('email', '', ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('password', 'Password') }}
					{{ Form::password('password', ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('password_confirm', 'Password Confirm') }}
					{{ Form::password('password_confirm', ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('phone', 'Phone Number') }}
					{{ Form::text('phone', '', ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('slug', 'Slug') }}
					{{ Form::text('slug', '', ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('birthday', 'Birthday') }}
					{{ Form::text('birthday', '', ['class'=> 'form-control']) }}
				</div>	
				<div class="form-group">
					{{ Form::label('celebrity', 'Celebrity ?')}}
					<div class="radio">
						<label>{{ Form::radio('celebrity','0', '',['class' => 'radio']) }} No</label>
						<label>{{ Form::radio('celebrity','1', '',['class' => 'radio']) }} Yes</label>
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('social_target', 'My Social Target Subscriber ?')}}
					<div class="radio">
						<label>{{ Form::radio('social_target','0', '',['class' => 'radio']) }} No</label>
						<label>{{ Form::radio('social_target','1', '',['class' => 'radio']) }} Yes</label>
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('social_action', 'Social Action Subscriber ?')}}
					<div class="radio">
						<label>{{ Form::radio('social_action','0', '',['class' => 'radio']) }} No</label>
						<label>{{ Form::radio('social_action','1',	'',	['class' => 'radio']) }} Yes</label>
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('newsletter_subscriber', 'Newsletter Subscriber ?')}}
					<div class="radio">
						<label>{{ Form::radio('newsletter_subscriber','0', '',['class' => 'radio']) }} No</label>
						<label>{{ Form::radio('newsletter_subscriber','1',	'',	['class' => 'radio']) }} Yes</label>
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('role', 'Role ?')}}
					<div class="radio">
						<label>{{ Form::radio('role','0', '',['class' => 'radio']) }} No</label>
						<label>{{ Form::radio('role','1',	'',	['class' => 'radio']) }} Yes</label>
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('status', 'Status')}}
					<div class="radio">
						<label>{{ Form::radio('status','0', '',['class' => 'radio']) }} Not Active</label>
						<label>{{ Form::radio('status','1',	'',	['class' => 'radio']) }} Active</label>
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