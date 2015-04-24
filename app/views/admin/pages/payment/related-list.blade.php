<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">
			@if (isset($new))
				Daftar Pembayaran Yang Butuh Konfirmasi
			@else
				Daftar Pembayaran Yang Terkait
			@endif
		</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		@if (count($payments))
		<table id="datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Nama Pembayar</th>
					<th>Donasi Pada</th>
					<th>Total Pembayaran</th>
					<th>Status</th>
					<th>Dibayar Pada</th>
					<th width="15%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($payments as $payment)
				<?php
				if ($payment->status == 1)
				{
					$class = '';
					$status = 'Pembayaran berhasil';
				}
				else
				{
					$class = ' class="info"';
					$status = 'Menunggu pemeriksaan admin';
				}
				?>
				<tr{{ $class }}>
					<td>
						<a href="{{ route('admin.user.show', $payment->user->id) }}">
						{{ $payment->user->firstname }} {{ $payment->user->lastname }}
						</a>
					</td>
					<td>
						@foreach ($payment->donations as $i => $donation)
							{{ ($i+1) }}. 
							<a href="{{ route('admin.donation.show', $donation->id) }}">
							@if (isset($donation->type->social_target_category_id))
								Target Sosial : {{ $donation->type->name }}
							@else
								Aksi Sosial : {{ $donation->type->name }}
							@endif
							, sebesar {{ $donation->currency }} {{ number_format($donation->total,0,',','.') }}
							</a><br />
						@endforeach
					</td>
					<td>
						{{ $payment->currency }} {{ number_format($payment->total,0,',','.') }}
					</td>
					<td>
						{{ $status }}
					</td>
					<td>{{ date('d M Y H:i:s', $payment->transferred_at) }}</td>
					<td>
						@if ($payment->status == 0)
						<a href="{{ route('admin.payment.update', $payment->id) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Ubah</a>
						<a href="{{ route('admin.payment.delete', $payment->id) }}" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>Nama Pembayar</th>
					<th>Donasi Pada</th>
					<th>Total Pembayaran</th>
					<th>Status</th>
					<th>Dibayar Pada</th>
					<th>Aksi</th>
				</tr>
			</tfoot>
		</table>
		@else
		<div class="callout callout-info">
			<p>
				@if (isset($new))
					Belum ada satupun Pembayaran yang butuh dikonfirmasi.
				@else
					Belum terjadi proses pembayaran.
				@endif
			</p>
		</div>
		@endif
	</div><!-- /.box-body -->
</div><!-- /.box -->