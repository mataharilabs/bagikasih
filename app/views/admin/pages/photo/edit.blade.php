@extends('admin.layouts.default')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Edit Data</h3>				
			</div><!-- /.box-header -->
			<div class="box-body">
				@if(count($errors))
					<div class="alert alert-warning">
					@foreach($errors->all() as $err)
					<p>{{ $err }}</p>	
					@endforeach
					</div>
				@endif				
				{{ Form::open(['route'=> 'admin.photo.update.post', 'files' => true]) }}				
				{{ Form::hidden('id', $data->id)}}
				<div class="form-group">
					{{ Form::label('name', 'Photo Name') }}
					{{ Form::text('name',  $data->name, ['class'=> 'form-control']) }}
				</div>							
				<div class="form-group">
					{{ Form::label('type_name', 'Type Name')}}					
					{{ Form::select('type_name',$options, $data->type_name,['class' => 'form-control','id' => 'typeName']) }}
				</div>
				<div class="form-group" id="typeIdAdd"></div>							
				<div class="form-group">
					{{ Form::label('status', 'Status')}}
					<div class="radio">
						<label>{{ Form::radio('status','0', $data->status,['class' => 'radio']) }} Not Active</label>
						<label>{{ Form::radio('status','1', $data->status,['class' => 'radio']) }} Active</label>
					</div>
				</div>
				<div class="form-group">
					{{ Form::submit('Save', ['class' => 'btn btn-info']) }} <a href="{{ route('admin.photo')}}" class="btn btn-default">Cancel</a>
				</div>
				{{ Form::close() }}
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
@stop
@section('append-js')
	@include('admin.pages.photo.script')
@stop