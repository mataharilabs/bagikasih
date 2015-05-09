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
				{{ Form::open(['route'=> 'admin.newsletter.update.post']) }}
				{{ Form::hidden('id', $data->id) }}
				<div class="form-group">
					{{ Form::label('user', 'User') }}
					{{ Form::select('user', $optionsUser, $data->user_id, ['class'=> 'form-control']) }}
				</div>				
				<div class="form-group">
					{{ Form::label('type', 'Type')}}
					<div class="radio">
						<label>{{ Form::radio('type','0',$data->type,['class' => 'radio']) }} Invoice</label>
						<label>{{ Form::radio('type','1',$data->type,['class' => 'radio']) }} Social Target Subscriber</label>
						<label>{{ Form::radio('type','2',$data->type,['class' => 'radio']) }} Social Action Subscriber</label>
						<label>{{ Form::radio('type','3',$data->type,['class' => 'radio']) }} Newsletter Subscriber</label>											
					</div>
				</div>				
				<div class="form-group">
					{{ Form::label('sender_email', 'Sender Email')}}
					{{ Form::text('sender_email', $data->sender_email, ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('sender_name', 'Sender Name')}}
					{{ Form::text('sender_name', $data->sender_name, ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('recipient_email', 'Recipient Email')}}
					{{ Form::text('recipient_email', $data->recipient_email, ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('recipient_name', 'Recipient Name')}}
					{{ Form::text('recipient_name', $data->recipient_email, ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('subject', 'Subject')}}
					{{ Form::text('subject', $data->subject, ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('message', 'Message')}}
					{{ Form::textarea('message', $data->message, ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('status', 'Status')}}
					<div class="radio">
						<label>{{ Form::radio('status','0',$data->status == 0? true : false,['class' => 'radio']) }} New</label>
						<label>{{ Form::radio('status','1',$data->status == 1? true : false,['class' => 'radio']) }} Is Sent</label>
						<label>{{ Form::radio('status','3',$data->status == 3? true : false,['class' => 'radio']) }} Is Failed</label>
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