@extends('admin.layouts.default')
@section('content')
<div class="row">
	<div class="col-xs-12">
		<!-- Related Social Actions -->
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
								<td>{{ $event->id }}</td>
							</tr>
							<tr>
								<th>Nama</th>
								<td>{{ $event->name }}</td>
							</tr>
							
							<tr>
								<th>Kota</th>
								<td>{{ $event->city->name }}</td>
							</tr>
							<tr>
								<th>Pembuat</th>
								<td>
									@if (isset($event->user))
									<a href="{{ route('admin.user.show', $event->user->id) }}">
										{{ $event->user->firstname }} {{ $event->user->lastname }}
									</a>
									@endif
								</td>
							</tr>
							<tr>
								<th>Location</th>
								<td>{{ $event->location }}</td>
							</tr>
							<tr>
								<th>Email</th>
								<td>{{ $event->email }}</td>
							</tr>
							<tr>
								<th>Website</th>
								<td><a href="http://{{ $event->website_url }}" class="btn btn-default btn-sm"><span class="glyphicon" aria-hidden="true"></span> Klik Website</a> </td>
							</tr>
							<tr>
								<th>Sosial Media</th>
								<td>{{ $event->social_media_urls }} </td>
							</tr>
							
							<tr>
								<th>Tentang Target Sosial</th>
								<td>{{ nl2br($event->description) }}</td>
							</tr>
							<tr>
								<th>Kepengurusan</th>
								<td>{{ nl2br($event->stewardship) }}</td>
							</tr>
							<tr>
								<th>Slug</th>
								<td> {{ $event->slug }}</td>
							</tr>
							<tr>
								<th>Foto Utama</th>
								<td><img src="{{ url('photos') }}/{{ $event->default_photo_id ? $event->default_photo_id : 'default' }}.jpg" class="img-polaroid img-rounded" style="max-width:150px;height:auto;"></td>
							</tr>
							<tr>
								<th>Foto Banner</th>
								<td><img src="{{ url('photos') }}/{{ $event->cover_photo_id ? $event->cover_photo_id : 'default-cover' }}.jpg" class="img-polaroid img-rounded" style="max-width:600px;height:auto;"></td>
							</tr>
							<tr>
								<th>Status</th>
								<td>
									@if ($event->status == 1)
									Aktif
									@elseif ($event->status == 0)
									Butuh Konfirmasi
									@elseif ($event->status == 2)
									Tidak Aktif
									@endif
								</td>
							</tr>
							<tr>
								<th>Dibuat Pada</th>
								<td>{{ date('d M Y H:i:s', $event->created_at->timestamp) }}</td>
							</tr>
							<tr>
								<th>Diubah Pada</th>
								<td>{{ date('d M Y H:i:s', $event->updated_at->timestamp) }}</td>
							</tr>
							<tr>
								<th>Aksi</th>
								<td>
									<a href="{{ route('admin.event') }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Kembali</a>
									<a href="{{ route('admin.event.update', $event->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
									<a href="{{ route('admin.event.delete', $event->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>
								</td>
							</tr>
						</tbody>
					</table>
					</div><!-- /.box-body -->
					</div><!-- /.box -->
					<!-- Related Social Actions -->
					@includess('admin.pages.social-action.related-list')
					<!-- Related Photos -->
					@include('admin.pages.photo.related-list')
				</div>
			</div>
			@stop