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
				{{ Form::open(['route'=> 'admin.newsletter.store']) }}
				{{ Form::hidden('id') }}
				<div class="form-group">
					{{ Form::label('user', 'User') }}
					{{ Form::select('user', $optionsUser, '', ['class'=> 'form-control']) }}
				</div>				
				<div class="form-group">
					{{ Form::label('type', 'Type')}}
					<div class="radio">
						<label>{{ Form::radio('type','0','',['class' => 'radio']) }} Invoice</label>
						<label>{{ Form::radio('type','1','',['class' => 'radio']) }} Social Target Subscriber</label>
						<label>{{ Form::radio('type','2','',['class' => 'radio']) }} Social Action Subscriber</label>
						<label>{{ Form::radio('type','3','',['class' => 'radio']) }} Newsletter Subscriber</label>											
					</div>
				</div>				
				<div class="form-group">
					{{ Form::label('sender_email', 'Sender Email')}}
					{{ Form::text('sender_email', '', ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('sender_name', 'Sender Name')}}
					{{ Form::text('sender_name', '', ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('recipient_email', 'Recipient Email')}}
					{{ Form::text('recipient_email', '', ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('recipient_name', 'Recipient Name')}}
					{{ Form::text('recipient_name', '', ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('subject', 'Subject')}}
					{{ Form::text('subject', '', ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('message', 'Message')}}
					{{ Form::textarea('message', '', ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('status', 'Status')}}
					<div class="radio">
						<label>{{ Form::radio('status','0','',['class' => 'radio']) }} New</label>
						<label>{{ Form::radio('status','1','',['class' => 'radio']) }} Is Sent</label>
						<label>{{ Form::radio('status','3','',['class' => 'radio']) }} Is Failed</label>
					</div>
				</div>
				<div class="form-group">
					{{ Form::submit('Save', ['class' => 'btn btn-info']) }} <a href="{{ route('admin.newsletter')}}" class="btn btn-default">Cancel</a>
				</div>
				{{ Form::close() }}
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
@stop