@extends('admin.layouts.default')

@section('append-css')
	<!-- DATA TABLES -->
	{{ HTML::style('assets/admin/plugins/datatables/dataTables.bootstrap.css'); }}
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data <b>{{ $title }}</b></h3>
				<a href="{{ route('admin.photo.create') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a>
			</div><!-- /.box-header -->
			<div class="box-body">
				@if(count($errors))
					<div class="alert alert-warning">
					@foreach($errors->all() as $err)
					<p>{{ $err }}</p>	
					@endforeach
					</div>
				@endif	
				@if(!empty($status))
					<div class="alert alert-warning">
					@foreach($status->all() as $err)
					<p>{{ $err }}</p>	
					@endforeach
					</div>
				@endif	
				<table id="datatable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Photo</th>
							<th>Status</th>
							<th>Diubah Pada</th>
							<th width="30%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $dt)
						<td>
							<img src="{{ asset('photos/'. 
							$dt->id.'.jpg')}}">
						</td>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Photo</th>
							<th>Status</th>
							<th>Diubah Pada</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
@stop

@section('append-js')
<!-- DATA TABES SCRIPT -->
{{ HTML::script('assets/admin/plugins/datatables/jquery.dataTables.js'); }}
{{ HTML::script('assets/admin/plugins/datatables/dataTables.bootstrap.js'); }}

<script type="text/javascript">
      $(function () {
        $('#datatable').dataTable();
      });
    </script>
@stop