@extends('emails.template')

@section('message')

<?php
if ($payment->status == 0)
{
	$status = '<span style="font-size: 12px; color: #2c3e50; display: inline-block; background-color: #eeeeee; padding: 4px 6px;">Menunggu pemeriksaan dari admin</span>';
	$subject = 'Proses konfirmasi pengiriman donasi Anda berhasil. Selanjutnya kami mohon kesediaan Anda untuk menunggu Admin BagiKasih melakukan verifikasi. BagiKasih akan mengirim Anda email jika proses verivikasi telah dilakukan. Terima kasih.';
}
else if ($payment->status == 1)
{
	$status = '<span style="font-size: 12px; color: #ffffff; display: inline-block; background-color: #ff93ab; padding: 4px 6px;">Pembayaran berhasil</span>';
	$subject = 'Proses donasi Anda telah berhasil kami terima. Kami akan menyalurkan donasi tersebut ke pihak yang tepat seperti yang Anda harapkan. Terima kasih.';
}
else if ($payment->status == 2)
{
	$status = '<span style="font-size: 12px; color: #ffffff; display: inline-block; background-color: #e74c3c; padding: 4px 6px;">Pembayaran dibatalkan</span>';
	$subject = '<p>Konfirmasi pembayaran telah dibatalkan oleh admin BagiKasih.</p> <p>Untuk keterangan lebih lanjut Anda dapat menghubungi admin di nomer +62 8170 393 0034. Atau Anda dapat melakukan konfirmasi pembayaran ulang pada donasi tersebut di halaman <a href="'.URL::route('riwayat-donasi').'">Riwayat Donasi</a>.</p> Terima kasih.';
}
?>

<tr>
	<td>
		<h2 style="font-weight: normal; margin: 0px;">Halo {{ $recipient_name }},</h2>
		<p style="margin-top: 8px; font-size: 14px;">{{ $subject }}</p>
	</td>
</tr>
<tr>
	<td>
		<p style="margin: 8px 0; font-size: 13px; color: #777777;">Status konfirmasi pembayaran Anda: </p>
		{{ $status }}
	</td>
</tr>
<tr>
	<td>
		<table align="left" width="100%" cellpadding="4" cellspacing="0" style="font-size: 12px; margin: 12px 0;">
			<thead style="font-size: 13px; color: #555555;">
				<tr align="left">
					<th width="20" style="border-bottom: 1px solid #cccccc">#</th>
					<th style="border-bottom: 1px solid #cccccc">Donatur</th>
					<th style="border-bottom: 1px solid #cccccc">Penerima</th>
					<th style="border-bottom: 1px solid #cccccc" align="right">Jumlah Donasi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($payment->donations as $i => $donation)

				<?php
				// about donation object
				if (isset($donation->type->social_action_category_id))
				{
					$type_name = 'Aksi Sosial';
					$type_url = URL::route('temukan-aksi-sosial');
				}
				else
				{
					$type_name = 'Target Sosial';
					$type_url = URL::route('temukan-target-sosial');
				}
				?>

				<tr>
					<td valign="top">{{ $i+1 }}</td>
					<td valign="top">
						{{ $recipient_name }}
					</td>
					<td valign="top">{{ $type_name }} : <a href="{{ $type_url }}/{{ $donation->type->slug }}">{{ $donation->type->name }}</a></td>
					<td valign="top" align="right">{{ $donation->currency }} {{ number_format($donation->total,0,',','.') }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</td>
</tr>
<tr>
	<td>
		<p style="margin: 8px 0;">Total Pembayaran yang Anda konfirmasikan adalah <strong>{{ $payment->currency }} {{ number_format($payment->total,0,',','.') }}</strong>.</p>
	</td>
</tr>
<tr>
	<td align="center">
		<a href="{{ URL::route('riwayat-donasi') }}" style="cursor: pointer; width: 80%; background-color: #ed1848; border: 1px solid #df1442; padding: 12px; color: #ffffff; border-radius: 5px; font-weight: bold; display: inline-block;">
			Lihat Riwayat Donasi
		</a>
	</td>
</tr>
@stop