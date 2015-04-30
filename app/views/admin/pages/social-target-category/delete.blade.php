@extends('admin.layouts.default')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Delete Data </h3>				
			</div><!-- /.box-header -->
			<div class="box-body">
			{{ Form::open(['route'=> 'admin.social-target-category.delete.post']) }}
			<div class="text-center">
			<h4>Yakin hapus, <b>{{ $data->name }}</b>?</h4>
			{{ Form::hidden('id', $data->id) }}
			<a href="{{ route('admin.social-target-category') }}" class="btn btn-default">Cancel</a>
			{{ Form::submit('Yakin',['class'=> 'btn btn-info']) }}
			</div>
			{{ Form::close() }}
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
@stop