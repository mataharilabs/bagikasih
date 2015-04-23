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
				<a href="{{ route('admin.social-target.create') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Kategori</th>
							<th>Kota</th>
							<th>Pembuat</th>
							<th>Donasi Terkumpul</th>
							<th>Status</th>
							<th width="30%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($social_targets as $social_target)
						<?php
						if ($social_target->status == 1)
						{
							$class = '';
							$status = 'Aktif';
						}
						else if ($social_target->status == 1)
						{
							$class = ' class="info"';
							$status = 'Butuh Konfirmasi';
						}
						else
						{
							$class = '';
							$status = 'Tidak Aktif';
						}
						?>
						<tr{{ $class }}>
							<td>{{ $social_target->name }}</td>
							<td>{{ $social_target->category->name }}</td>
							<td>{{ $social_target->city->name }}</td>
							<td>
								@if (isset($social_target->user))
								<a href="{{ route('admin.user.show', $social_target->user->id) }}">
									{{ $social_target->user->firstname }} {{ $social_target->user->lastname }}
								</a>
								@endif
							</td>
							<td>{{ $social_target->currency }} {{ number_format($social_target->total_donation,0,',','.') }}</td>
							<td>
								{{ $status }}
							</td>
							<td>
								<a href="{{ route('admin.social-target.show', $social_target->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Lihat</a>
								<a href="{{ route('admin.social-target.update', $social_target->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
								<a href="{{ route('admin.social-target.delete', $social_target->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Nama</th>
							<th>Kategori</th>
							<th>Kota</th>
							<th>Pembuat</th>
							<th>Total Donasi</th>
							<th>Status</th>
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
		$('#datatable').dataTable({
			aaSorting: [[ 5, "desc" ]]
		});
	});
</script>
@stop