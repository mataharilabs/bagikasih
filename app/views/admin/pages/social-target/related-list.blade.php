<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">
			@if (isset($new))
				Daftar Target Sosial Yang Baru
			@else
				Daftar Target Sosial Yang Terkait
			@endif
		</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		@if (count($social_targets))
		<table id="datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Kategori</th>
					<th>Kota</th>
					<th>Pembuat</th>
					<th>Donasi Terkumpul</th>
					<th>Status</th>
					<th>Dibuat Pada</th>
					<th width="15%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($social_targets as $social_target)
				<?php
				if ($social_target->status == 1)
				{
					$class = '';
					$status = 'Aktif';
				}
				else
				{
					$class = ' class="info"';
					$status = 'Butuh Konfirmasi';
				}
				?>
				<tr{{ $class }}>
					<td>{{ $social_target->name }}</td>
					<td>{{ $social_target->category->name }}</td>
					<td>{{ $social_target->city->name }}</td>
					<td>
						@if (isset($social_target->user))
						<a href="{{ route('admin.user.show', $social_target->user->id) }}">
							{{ $social_target->user->firstname }} {{ $social_target->user->lastname }}
						</a>
						@endif
					</td>
					<td>{{ $social_target->currency }} {{ number_format($social_target->total_donation,0,',','.') }}</td>
					<td>
						{{ $status }}
					</td>
					<td>{{ date('d M Y H:i:s', $social_target->created_at->timestamp) }}</td>
					<td>
						<a href="{{ route('admin.social-target.show', $social_target->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Lihat</a>
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>Nama</th>
					<th>Kategori</th>
					<th>Kota</th>
					<th>Pembuat</th>
					<th>Donasi Terkumpul</th>
					<th>Status</th>
					<th>Dibuat Pada</th>
					<th>Aksi</th>
				</tr>
			</tfoot>
		</table>
		@else
		<div class="callout callout-info">
			<p>
				@if (isset($new))
					Belum ada satupun Target Sosial yang baru.
				@else
					Belum ada satupun Target Sosial yang dibuat.
				@endif
			</p>
		</div>
		@endif
	</div><!-- /.box-body -->
</div><!-- /.box -->