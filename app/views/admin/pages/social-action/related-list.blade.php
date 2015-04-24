<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">
			@if (isset($new))
				Daftar Aksi Sosial Yang Baru
			@else
				Daftar Aksi Sosial Yang Terkait
			@endif
		</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		@if (count($social_actions))
		<table id="datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Kategori</th>
					<th>Kota</th>
					<th>Pembuat</th>
					<th>Total Target Donasi</th>
					<th>Total Donasi Terkumpul</th>
					<th>Status</th>
					<th>Dibuat Pada</th>
					<th width="15%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($social_actions as $social_action)
				<?php
				if ($social_action->status == 1)
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
					<td>{{ $social_action->name }}</td>
					<td>{{ $social_action->category->name }}</td>
					<td>{{ $social_action->city->name }}</td>
					<td>
						@if (isset($social_action->user))
						<a href="{{ route('admin.user.show', $social_action->user->id) }}">
							{{ $social_action->user->firstname }} {{ $social_action->user->lastname }}
						</a>
						@endif
					</td>
					<td>{{ $social_action->currency }} {{ number_format($social_action->total_donation_target,0,',','.') }}</td>
					<td>{{ $social_action->currency }} {{ number_format($social_action->total_donation,0,',','.') }}</td>
					<td>
						{{ $status }}
					</td>
					<td>{{ date('d M Y H:i:s', $social_action->created_at->timestamp) }}</td>
					<td>
						<a href="{{ route('admin.social-action.show', $social_action->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Lihat</a>
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
					<th>Total Target Donasi</th>
					<th>Total Donasi Terkumpul</th>
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
					Belum ada satupun Aksi Sosial yang baru.
				@else
					Belum ada satupun Aksi Sosial yang dibuat.
				@endif
			</p>
		</div>
		@endif
	</div><!-- /.box-body -->
</div><!-- /.box -->