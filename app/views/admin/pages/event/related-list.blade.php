<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">
			@if (isset($new))
				Daftar Event Yang Baru
			@else
				Daftar Event Yang Terkait
			@endif
		</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		@if (count($events))
		<table id="datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Kategori</th>
					<th>Kota</th>
					<th>Pembuat</th>
					<th>Status</th>
					<th width="25%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($events as $event)
				<?php
				if ($event->status == 1)
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
					<td>{{ $event->name }}</td>
					<td>{{ $event->category->name }}</td>
					<td>{{ $event->city->name }}</td>
					<td>
						@if (isset($event->user))
						<a href="{{ route('admin.user.show', $event->user->id) }}">
							{{ $event->user->firstname }} {{ $event->user->lastname }}
						</a>
						@endif
					</td>
					<td>
						{{ $status }}
					</td>
					<td>
						<a href="{{ route('admin.event.show', $event->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Lihat</a>
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
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</tfoot>
		</table>
		@else
		<div class="callout callout-info">
			<p>
				@if (isset($new))
					Belum ada satupun Event yang baru.
				@else
					Belum ada satupun Event yang dibuat.
				@endif
			</p>
		</div>
		@endif
	</div><!-- /.box-body -->
</div><!-- /.box -->