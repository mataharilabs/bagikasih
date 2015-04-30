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
				{{ Form::open(['route'=> 'admin.social-target-category.store']) }}				
				<div class="form-group">
					{{ Form::label('name', 'Social Target Category Name') }}
					{{ Form::text('name', '', ['class'=> 'form-control']) }}
				</div>				
				<div class="form-group">
					{{ Form::label('status', 'Status')}}
					<div class="radio">
						<label>{{ Form::radio('status','0','',['class' => 'radio']) }} Not Active</label>
						<label>{{ Form::radio('status','1','',['class' => 'radio']) }} Active</label>
					</div>
				</div>
				<div class="form-group">
					{{ Form::submit('Save', ['class' => 'btn btn-info']) }} <a href="{{ route('admin.social-target-category')}}" class="btn btn-default">Cancel</a>
				</div>
				{{ Form::close() }}
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
@stop