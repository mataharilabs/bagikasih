@extends('admin.layouts.default')

@section('content')
<div class="row">
    <div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data <b>{{ $title }}</b></h3>
				<a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped">
					<tbody>
						<tr>
							<th>ID</th>
							<td>{{ $report->id }}</td>
						</tr>
						<tr>
							<th>Created By</th>
							<td>{{ $report->user_id == NULL ? 'Anonymous' : $report['user']->firtsname }}</td>
						</tr>
						<tr>
							<th>Subject</th>
							<td>{{ (int) $report->subject_code == 1 ? 'Pengajuan Update data' : ((int) $report->subject_code == 2 ? 'Pelaporan Data Palsu' : 'Lainnya') }}</td>
						</tr>

						<tr>
							<th>From</th>
							<td>{{ $report->type_name }}</td>
						</tr>
						<tr>
							<th>Message</th>
							<td>{{ $report->message }}</td>
						</tr>
						<tr>
							<th>Spesific Name</th>
							<td>
									@if ($report->type_name == 'events')
										{{ $report['event']->name }}
									@elseif(($report->type_name == 'social_actions'))
										{{ $report['social_action']->name }}
									@else
										{{ $report['social_target']->name }}
									@endif
							</td>
						</tr>
						<tr>
							<th>Status</th>
							<td>
								@if ($report->status == 1)
									Aktif
								@elseif ($report->status == 2)
									Tidak Aktif
								@else
									Butuh Konfirmasi
								@endif
							</td>
						</tr>
						<tr>
							<th>Created At</th>
							<td>
								{{ $report->created_at }}
							</td>
						</tr>
						<tr>
							<th>Updated At</th>
							<td>
								{{ $report->updated_at }}
								
							</td>
						</tr>
						<tr>
							<th>Aksi</th>
							<td>
								<a href="{{ route('admin.report') }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Kembali</a>
								<a href="#" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
								<a href="#" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

		
	</div>
</div>
@stop