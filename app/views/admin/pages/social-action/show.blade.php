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
								<td>{{ $social_actions->id }}</td>
							</tr>
							<tr>
								<th>Nama</th>
								<td>{{ $social_actions->name }}</td>
							</tr>
							
							<tr>
								<th>Kota</th>
								<td>{{ $social_actions->city->name }}</td>
							</tr>
							<tr>
								<th>Pembuat</th>
								<td>
									@if (isset($social_actions->user))
									<a href="{{ route('admin.user.show', $social_actions->user->id) }}">
										{{ $social_actions->user->firstname }} {{ $social_actions->user->lastname }}
									</a>
									@endif
								</td>
							</tr>
							<tr>
								<th>Donasi Terkumpul</th>
								<td>{{ $social_actions->currency }} {{ number_format($social_actions->total_donation,0,',','.') }}</td>
							</tr>
							<tr>
								<th>Total Aksi Sosial Yang Berjalan</th>
								<td>{{ $social_actions->total_running_social_actionss }} Aksi Sosial</td>
							</tr>
							<tr>
								<th>Tentang Target Sosial</th>
								<td>{{ nl2br($social_actions->description) }}</td>
							</tr>
							<tr>
								<th>Kepengurusan</th>
								<td>{{ nl2br($social_actions->stewardship) }}</td>
							</tr>
							<tr>
								<th>No.Rekening Bank</th>
								<td>{{ nl2br($social_actions->bank_account_description) }}</td>
							</tr>
							<tr>
								<th>Foto Utama</th>
								<td><img src="{{ url('photos') }}/{{ $social_actions->default_photo_id ? $social_actions->default_photo_id : 'default' }}.jpg" class="img-polaroid img-rounded" style="max-width:150px;height:auto;"></td>
							</tr>
							<tr>
								<th>Foto Banner</th>
								<td><img src="{{ url('photos') }}/{{ $social_actions->cover_photo_id ? $social_actions->cover_photo_id : 'default-cover' }}.jpg" class="img-polaroid img-rounded" style="max-width:600px;height:auto;"></td>
							</tr>
							<tr>
								<th>Status</th>
								<td>
									@if ($social_actions->status == 1)
									Aktif
									@elseif ($social_actions->status == 0)
									Butuh Konfirmasi
									@elseif ($social_actions->status == 2)
									Tidak Aktif
									@endif
								</td>
							</tr>
							<tr>
								<th>Dibuat Pada</th>
								<td>{{ date('d M Y H:i:s', $social_actions->created_at->timestamp) }}</td>
							</tr>
							<tr>
								<th>Diubah Pada</th>
								<td>{{ date('d M Y H:i:s', $social_actions->updated_at->timestamp) }}</td>
							</tr>
							<tr>
								<th>Aksi</th>
								<td>
									<a href="{{ route('admin.social-action') }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Kembali</a>
									<a href="{{ route('admin.social-action.update', $social_actions->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
									<a href="{{ route('admin.social-action.delete', $social_actions->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>
								</td>
							</tr>
						</tbody>
					</table>
					</div><!-- /.box-body -->
					</div><!-- /.box -->
					<!-- Related Donations -->
					@include('admin.pages.donation.related-list')
					<!-- Related Photos -->
					@include('admin.pages.photo.related-list')
				</div>
			</div>
			@stop