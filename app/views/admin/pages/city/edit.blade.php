@extends('admin.layouts.default')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Edit Data ID {{ $city->id }}</h3>				
			</div><!-- /.box-header -->
			<div class="box-body">
				@if(count($errors))
					<div class="alert alert-warning">
					@foreach($errors->all() as $err)
					<p>{{ $err }}</p>	
					@endforeach
					</div>
				@endif				
				{{ Form::open(['route'=> 'admin.city.update.post']) }}
				{{ Form::hidden('id', $city->id) }}
				<div class="form-group">
					{{ Form::label('city', 'City Name') }}
					{{ Form::text('name', $city->name, ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('country', 'Country')}}
					{{ Form::select('country', $options_country, $city->country_id, ['class'=> 'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('status', 'Status')}}
					<div class="radio">
						<label>{{ Form::radio('status','0', $city->status == 0? true : '',['class' => 'radio']) }} Not Active</label>
						<label>{{ Form::radio('status','1', $city->status == 1? true : '',['class' => 'radio']) }} Active</label>
					</div>
				</div>
				<div class="form-group">
					{{ Form::submit('Save', ['class' => 'btn btn-info']) }} <a href="{{ route('admin.city')}}" class="btn btn-default">Cancel</a>
				</div>
				{{ Form::close() }}
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
@stop