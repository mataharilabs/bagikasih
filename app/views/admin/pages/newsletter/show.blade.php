@extends('admin.layouts.default')

@section('content')
<div class="row">
    <div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data <b>{{ $title }}</b></h3>
				<a href="{{ route('admin.newsletter.create') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table id="datatable" class="table table-bordered table-striped">
					<tbody>
						<tr>
							<th>ID</th>
							<td>{{ $data->id }}</td>
						</tr>						
						<tr>
							<th>User</th>
							<td>{{ $data->user->firstname }}</td>
						</tr>
						<tr>
							<th>Status</th>
							<td>
								{{ $data->status == 0? 'New' 		: '' }}
								{{ $data->status == 1? 'Sent' 	: '' }}
								{{ $data->status == 2? 'Failed' 	: '' }}
							</td>
						</tr>
						<tr>
							<th>Dibuat Pada</th>
							<td>{{ date('d M Y H:i:s', $data->created_at->timestamp) }}</td>
						</tr>
						<tr>
							<th>Diubah Pada</th>
							<td>{{ date('d M Y H:i:s', $data->updated_at->timestamp) }}</td>
						</tr>
						<tr>
							<th>Aksi</th>
							<td>
								<a href="{{ route('admin.newsletter') }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Kembali</a>
								<a href="{{ route('admin.newsletter.update', $data->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
								<a href="{{ route('admin.newsletter.delete', $data->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
@stop