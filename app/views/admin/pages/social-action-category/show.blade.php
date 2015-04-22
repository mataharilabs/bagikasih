@extends('admin.layouts.default')

@section('content')
<div class="row">
    <div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data <b>{{ $title }}</b></h3>
				<a href="{{ route('admin.social-action-category.create') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped">
					<tbody>
						<tr>
							<th>ID</th>
							<td>{{ $category->id }}</td>
						</tr>
						<tr>
							<th>Nama</th>
							<td>{{ $category->name }}</td>
						</tr>
						<tr>
							<th>Status</th>
							<td>
								@if ($category->status == 1)
									Aktif
								@else
									Tidak Aktif
								@endif
							</td>
						</tr>
						<tr>
							<th>Dibuat Pada</th>
							<td>{{ date('d M Y H:i:s', $category->created_at->timestamp) }}</td>
						</tr>
						<tr>
							<th>Diubah Pada</th>
							<td>{{ date('d M Y H:i:s', $category->updated_at->timestamp) }}</td>
						</tr>
						<tr>
							<th>Aksi</th>
							<td>
								<a href="{{ route('admin.social-action-category') }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Kembali</a>
								<a href="{{ route('admin.social-action-category.update', $category->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
								<a href="{{ route('admin.social-action-category.delete', $category->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
@stop