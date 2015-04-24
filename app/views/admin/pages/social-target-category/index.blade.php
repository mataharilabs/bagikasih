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
				<a href="{{ route('admin.social-target-category.create') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Status</th>
							<th>Diubah Pada</th>
							<th width="30%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($categories as $category)
						<tr>
							<td>{{ $category->name }}</td>
							<td>
								@if ($category->status == 1)
									Aktif
								@else
									Tidak Aktif
								@endif
							</td>
							<td>{{ date('d M Y H:i', $category->updated_at->timestamp) }}</td>
							<td>
								<a href="{{ route('admin.social-target-category.show', $category->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Lihat</a>
								<a href="{{ route('admin.social-target-category.update', $category->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
								<a href="{{ route('admin.social-target-category.delete', $category->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Nama</th>
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