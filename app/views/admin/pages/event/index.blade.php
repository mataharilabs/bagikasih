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
				<a href="{{ route('admin.event.create') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a>
			</div><!-- /.box-header -->
			<div class="box-body">


				@if(Session::has('sukses'))
						<div class="alert alert-success">
							<p>{{ Session::get('sukses') }}</p>	
						</div>
				@endif	

				<table id="datatable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Pembuat</th>
							<th>Kategori Event</th>
							<th>Nama Event</th>
							<th>Kota Asal</th>
							<th>Expired</th>
							<th>Status</th>
							<th width="20%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($event as $val)
						<tr>
							<td><a href="{{ URL::route('admin.user.show',$val->user['id']) }}">{{ $val->user['firstname'] }} {{ $val->user['lastname'] }}</a></td>
							<td>{{ $val->eventcategory['name'] }}</td>
							<td>{{ $val->name }}</td>
							<td>{{ $val->city->name }}</td>
							<td>{{ date('d-m-Y',$val->expired_at) }}</td>
							<td>
								@if ($val->status == 1)
									Aktif
								@elseif ($val->status == 2)
									Tidak Aktif
								@else
									Butuh Konfirmasi
								@endif
							</td>
							<td>
								<a href="{{ route('admin.event.show', $val->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> </a>
								<a href="{{ route('admin.event.update', $val->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
								<a href="{{ route('admin.event.delete', $val->id) }}" onclick="return confirm('Anda yakin..???');" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Pembuat</th>
							<th>Kategori Event</th>
							<th>Nama Event</th>
							<th>Kota Asal</th>
							<th>Expired</th>
							<th>Status</th>
							<th width="20%">Aksi</th>
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
		$('#datatable').dataTable({
			"order": [[ 5, "desc" ]]
		});
	});
</script>
@stop