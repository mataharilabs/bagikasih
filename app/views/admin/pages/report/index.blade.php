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
							<th>Created By</th>
							<th>Subject</th>
							<!-- <th>Messgae</th> -->
							<th>From</th>
							<th>Spesific Name</th>
							<th>status</th>
							<th>Created</th>
							<!-- <th>Updated</th> -->
							<th width="30%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($report as $val)
						<tr>
							<td>{{ $val->user_id == NULL ? 'Anonymous' : $val['user']['firstname'] }}</td>
							<td>{{ (int) $val->subject_code == 1 ? 'Pengajuan Update data' : ((int) $val->subject_code == 2 ? 'Pelaporan Data Palsu' : 'Lainnya') }}</td>
							<!-- <td>{{ $val->message }}</td> -->
							<td>{{ $val->type_name }}</td>
							<td>
								@if ($val->type_name == 'events')
									{{ $val['event']->name }}
								@elseif(($val->type_name == 'social_actions'))
									{{ $val['social_action']->name }}
								@else
									{{ $val['social_target']->name }}
								@endif
							</td>
							<td>
								@if ($val->status == 1)
									Aktif
								@else
									Butuh Konfirmasi
								@endif
							</td>
							<td>{{ $val->created_at }}</td>
							<!-- <td>{{ $val->updated_at }}</td> -->

							<td>
								<a href="{{ route('admin.report.view', $val->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> </a>
								<a href="#" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
								<a href="#" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Created By</th>
							<th>Subject</th>
							<!-- <th>Messgae</th> -->
							<th>From</th>
							<th>Spesific Name</th>
							<th>status</th>
							<th>Created</th>
							<!-- <th>Updated</th> -->
							<th width="30%">Aksi</th>
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