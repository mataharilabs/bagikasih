<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Daftar Donatur Yang Terkait</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		@if (count($donations))
		<table id="datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Nama Donatur</th>
					<th>Total Donasi</th>
					<th>Status</th>
					<th>Dibuat Pada</th>
					<th width="30%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($donations as $donation)
				<?php
				if ($donation->status == 0 and $donation->payment_id == null)
				{
					$status = 'Belum Ditransfer';
					$class = '';
				}
				else if ($donation->status == 0)
				{
					$status = 'Menunggu pemeriksaan admin';
					$class = ' class="info"';
				}
				else if ($donation->status == 1)
				{
					$status = 'Donasi berhasil';
					$class = '';
				}
				?>
				<tr{{ $class }}>
					<td>
						@if ($donation->as_noname)
							<div>Anonim</div>
							<div>( {{ $donation->user->firstname }} {{ $donation->user->lastname }} )</div>
						@else
							{{ $donation->user->firstname }} {{ $donation->user->lastname }}
						@endif
					</td>
					<td>{{ $donation->currency }} {{ number_format($donation->total,0,',','.') }}</td>
					<td>{{ $status }}</td>
					<td>{{ date('d M Y H:i', $donation->created_at->timestamp) }}</td>
					<td>
						<a href="{{ route('admin.donation.show', $donation->id) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Lihat</a>
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>Nama Donatur</th>
					<th>Total Donasi</th>
					<th>Status</th>
					<th>Dibuat Pada</th>
					<th>Aksi</th>
				</tr>
			</tfoot>
		</table>
		@else
		<div class="callout callout-info">
			<p>Belum ada satupun Donasi yang dibuat.</p>
		</div>
		@endif
	</div><!-- /.box-body -->
</div><!-- /.box -->