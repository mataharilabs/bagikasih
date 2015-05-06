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
				<a href="{{ route('admin.donation.create') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a>
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
							<th>Nama Donatur</th>
							<th>Donasi Pada</th>
							<th>Total Donasi</th>
							<th>Status</th>
							<th>Dibuat Pada</th>
							<th width="25%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($donations as $donation)
						<?php
						if ($donation->status == 0 and $donation->payment_id == null)
						{
							$status = 'Belum Dibayar';
							$class = '';
						}
						else if ($donation->status == 0)
						{
							$status = 'Menunggu pemeriksaan admin';
							$class = ' class="info"';
						}
						else if ($donation->status == 1)
						{
							$status = 'Donasi berhasil';
							$class = '';
						}
						?>
						<tr{{ $class }}>
							<td>
								<a href="{{ route('admin.user.show', $donation->user->id) }}">
								@if ($donation->as_noname)
									<div>Anonim</div>
									<div>( {{ $donation->user->firstname }} {{ $donation->user->lastname }} )</div>
								@else
									{{ $donation->user->firstname }} {{ $donation->user->lastname }}
								@endif
								</a>
							</td>
							<td>
								@if (isset($donation->type->social_target_category_id))
									Target Sosial : <a href="{{ route('admin.social-target.show', $donation->type_id) }}">{{ $donation->type->name }}</a>
								@else
									Aksi Sosial : <a href="{{ route('admin.social-action.show', $donation->type_id) }}">{{ $donation->type->name }}</a>
								@endif
							</td>
							<td>
								{{ $donation->currency }} {{ number_format($donation->total,0,',','.') }}
							</td>
							<td>{{ $status }}</td>
							<td>{{ date('d M Y H:i', $donation->created_at->timestamp) }}</td>
							<td>
								<a href="{{ route('admin.donation.show', $donation->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Lihat</a>
								<a href="{{ route('admin.donation.update', $donation->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
								<a href="{{ route('admin.donation.delete', $donation->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Nama Donatur</th>
							<th>Donasi Pada</th>
							<th>Total Donasi</th>
							<th>Status</th>
							<th>Dibuat Pada</th>
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
			aaSorting: [[ 3, "desc" ]]
		});
	});
</script>
@stop