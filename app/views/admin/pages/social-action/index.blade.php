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
				<a href="{{ route('admin.social-action.create') }}" class="btn btn-success btn-sm">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a>
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
							<th>Nama</th>
							<th>Pembuat</th>
							<th>Kota Asal</th>
							<th>Donasi Target</th>
							<th>Donasi</th>
							<th>Expired</th>
							<th>Status</th>
							<th width="20%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($social_action as $val)
						<tr>
							<td>{{ $val->name }}</td>
							@if($val->user == NULL)
								<td>Anonymous</td>
							@else
								<td>{{ $val->user->firstname }} {{ $val->user->lastname }}</td>
							@endif
							<td>{{ $val->city->name }}</td>
							<td>{{ $val->currency }} {{ number_format($val->total_donation_target,0,',','.') }}</td>
							<td>{{ $val->currency }} {{ number_format($val->total_donation,0,',','.') }}</td>
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
								<a href="{{ route('admin.social-action.show', $val->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> </a>
								<a href="{{ route('admin.social-action.update', $val->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
								<a href="{{ route('admin.social-action.delete', $val->id) }}" onclick="return confirm('Anda yakin..???');" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Nama</th>
							<th>Pembuat</th>
							<th>Kota Asal</th>
							<th>Donasi Target</th>
							<th>Donasi</th>
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