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
				{{ Form::open(['route'=> 'admin.photo.store']) }}				
				<div class="form-group">
					{{ Form::label('name', 'Photo Name') }}
					{{ Form::text('name', '', ['class'=> 'form-control']) }}
				</div>				
				<div class="form-group">
					{{ Form::label('type_name', 'Type Name')}}					
					{{ Form::select('type_name',$options,'',['class' => 'form-control','id' => 'typeName']) }}
				</div>
				<div class="form-group hide" id="addTypeId"></div>
				<div class="form-group">
					{{ Form::submit('Save', ['class' => 'btn btn-info']) }} <a href="{{ route('admin.photo')}}" class="btn btn-default">Cancel</a>
				</div>
				{{ Form::close() }}
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
@include('admin.pages.photo.script')
@stop