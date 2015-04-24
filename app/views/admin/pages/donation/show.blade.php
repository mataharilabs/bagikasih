@extends('admin.layouts.default')

@section('content')
<div class="row">
    <div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data <b>{{ $title }}</b></h3>
				<a href="{{ route('admin.donation.create') }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah</a>
			</div><!-- /.box-header -->
			<div class="box-body">
				<?php
				if ($donation->status == 0 and $donation->payment_id == null)
				{
					$status = 'Belum Dibayar';
				}
				else if ($donation->status == 0)
				{
					$status = 'Menunggu pemeriksaan admin';
				}
				else if ($donation->status == 1)
				{
					$status = 'Donasi berhasil';
				}
				?>
				<table id="datatable" class="table table-bordered table-striped">
					<tbody>
						<tr>
							<th>ID</th>
							<td>{{ $donation->id }}</td>
						</tr>
						<tr>
							<th>Nama Donatur</th>
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
						</tr>
						<tr>
							<th>Donasi Pada</th>
							<td>
								@if (isset($donation->type->social_target_category_id))
									Target Sosial : <a href="{{ route('admin.social-target.show', $donation->type_id) }}">{{ $donation->type->name }}</a>
								@else
									Aksi Sosial : <a href="{{ route('admin.social-action.show', $donation->type_id) }}">{{ $donation->type->name }}</a>
								@endif
							</td>
						</tr>
						<tr>
							<th>Total Donasi</th>
							<td>
								{{ $donation->currency }} {{ number_format($donation->total,0,',','.') }}
							</td>
						</tr>
						<tr>
							<th>Pesan</th>
							<td>
								{{ nl2br($donation->message) }}
							</td>
						</tr>
						<tr>
							<th>Status</th>
							<td>
								{{ $status }}
							</td>
						</tr>
						<tr>
							<th>Dibuat Pada</th>
							<td>{{ date('d M Y H:i:s', $donation->created_at->timestamp) }}</td>
						</tr>
						<tr>
							<th>Diubah Pada</th>
							<td>{{ date('d M Y H:i:s', $donation->updated_at->timestamp) }}</td>
						</tr>
						<tr>
							<th>Aksi</th>
							<td>
								<a href="{{ route('admin.donation') }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Kembali</a>
								<a href="{{ route('admin.donation.update', $donation->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
								<a href="{{ route('admin.donation.delete', $donation->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

		<!-- Related Payment -->
		@include('admin.pages.payment.related-show')

	</div>
</div>
@stop