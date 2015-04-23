@extends('admin.layouts.default')

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
					<tbody>
						<tr>
							<th>ID</th>
							<td>{{ $users->id }}</td>
						</tr>
						<tr>
							<th>Nama</th>
							<td>{{ $users->name }}</td>
						</tr>
				
						<tr>
							<th>Kota</th>
							<td>{{ $users->city->name }}</td>
						</tr>
						<tr>
							<th>Pembuat</th>
							<td>
								@if (isset($users->user))
								<a href="{{ route('admin.user.show', $users->user->id) }}">
									{{ $users->user->firstname }} {{ $users->user->lastname }}
								</a>
								@endif
							</td>
						</tr>
						<tr>
							<th>Donasi Terkumpul</th>
							<td>{{ $users->currency }} {{ number_format($users->total_donation,0,',','.') }}</td>
						</tr>
						<tr>
							<th>Total Aksi Sosial Yang Berjalan</th>
							<td>{{ $users->total_running_social_actions }} Aksi Sosial</td>
						</tr>
						<tr>
							<th>No.Telp</th>
							<td>{{ $users->phone_number }}</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>{{ $users->email }}</td>
						</tr>
						<tr>
							<th>Slug</th>
							<td>{{ $users->slug }}</td>
						</tr>
						<tr>
							<th>Foto Utama</th>
							<td><img src="{{ url('photos') }}/{{ $users->default_photo_id ? $users->default_photo_id : 'default' }}.jpg" class="img-polaroid img-rounded" style="max-width:150px;height:auto;"></td>
						</tr>
						<tr>
							<th>Foto Banner</th>
							<td><img src="{{ url('photos') }}/{{ $users->cover_photo_id ? $users->cover_photo_id : 'default-cover' }}.jpg" class="img-polaroid img-rounded" style="max-width:600px;height:auto;"></td>
						</tr>
						<tr>
							<th>Status</th>
							<td>
								@if ($users->status == 1)
									Aktif
								@elseif ($users->status == 0)
									Butuh Konfirmasi
								@elseif ($users->status == 2)
									Tidak Aktif
								@endif
							</td>
						</tr>
						<tr>
							<th>Terdaftar Pada</th>
							<td>{{ date('d M Y H:i:s', $users->created_at->timestamp) }}</td>
						</tr>
						<tr>
							<th>Terupdate Pada</th>
							<td>{{ date('d M Y H:i:s', $users->updated_at->timestamp) }}</td>
						</tr>
						<tr>
							<th>Aksi</th>
							<td>
								<a href="{{ route('admin.user') }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Kembali</a>
								<a href="{{ route('admin.user.update', $users->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
								<a href="{{ route('admin.user.delete', $users->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

		<!-- Related Social Actions -->
		@include('admin.pages.social-action.related-list')

		<!-- Related Donations -->
		@include('admin.pages.donation.related-list')

		<!-- Related Photos -->
		@include('admin.pages.photo.related-list')

	</div>
</div>
@stop