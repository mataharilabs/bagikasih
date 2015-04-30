@extends('admin.layouts.default')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Delete Data </h3>				
			</div><!-- /.box-header -->
			<div class="box-body">
			{{ Form::open(['route'=> 'admin.city.delete.post']) }}
			<div class="text-center">
			<h4>Yakin hapus, <b>{{ $city->name }}</b>?</h4>
			{{ Form::hidden('id', $city->id) }}
			<a href="{{ route('admin.city')}}" class="btn btn-default">Cancel</a>
			{{ Form::submit('Yakin',['class'=> 'btn btn-info']) }}
			</div>
			{{ Form::close() }}
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
@stop