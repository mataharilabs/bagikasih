@extends('emails.template')

@section('message')

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

// about donation status
if ($donation->status == 0 and $donation->payment_id == null)
{
	$status = '<span style="font-size: 12px; color: #ffffff; display: inline-block; background-color: #3498db; padding: 4px 6px;">Menunggu konfirmasi dari Anda</span>';
	$need_confirmation = true;
}
else if ($donation->status == 0)
{
	$status = '<span style="font-size: 12px; color: #2c3e50; display: inline-block; background-color: #eeeeee; padding: 4px 6px;">Menunggu pemeriksaan dari admin</span>';
	$need_confirmation = false;
}
else if ($donation->status == 1)
{
	$status = '<span style="font-size: 12px; color: #ffffff; display: inline-block; background-color: #ff93ab; padding: 4px 6px;">Donasi berhasil</span>';
	$need_confirmation = false;
}
?>

<tr>
	<td>
		<h2 style="font-weight: normal; margin: 0px;">Halo {{ $recipient_name }},</h2>
		<p style="margin-top: 8px; font-size: 14px;">Terima kasih! 1 langkah lagi untuk proses donasi.</p>
	</td>
</tr>
<tr>
	<td>
		<p style="margin: 8px 0; font-size: 13px; color: #777777;">Status donasi Anda: </p>
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
				<tr>
					<td valign="top">1</td>
					<td valign="top">
						{{ $recipient_name }}
					</td>
					<td valign="top">{{ $type_name }} : <a href="{{ $type_url }}/{{ $donation->type->slug }}">{{ $donation->type->name }}</a></td>
					<td valign="top" align="right">{{ $donation->currency }} {{ number_format($donation->total,0,',','.') }}</td>
				</tr>
			</tbody>
		</table>
	</td>
</tr>
@if ($need_confirmation)
<tr>
	<td>
		<p style="margin: 8px 0;">Mohon melakukan Konfirmasi Pembayaran paling lambat tanggal <strong>{{ date('d M Y', $donation->created_at->timestamp + (7*24*60*60)) }}</strong>.</p>
	</td>
</tr>
<tr>
	<td align="center">
		<a href="{{ URL::route('riwayat-donasi') }}" style="cursor: pointer; width: 80%; background-color: #ed1848; border: 1px solid #df1442; padding: 12px; color: #ffffff; border-radius: 5px; font-weight: bold; display: inline-block;">
			Konfirmasi Sekarang
		</a>
	</td>
</tr>
@else
<tr>
	<td align="center">
		<a href="{{ URL::route('riwayat-donasi') }}" style="cursor: pointer; width: 80%; background-color: #ed1848; border: 1px solid #df1442; padding: 12px; color: #ffffff; border-radius: 5px; font-weight: bold; display: inline-block;">
			Lihat Riwayat Donasi
		</a>
	</td>
</tr>
@endif
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td>
		<div style="margin-top: 20px; padding: 8px 14px; border: 1px solid #eeeeee; border-left: 3px solid #E4E21C; font-size: 13px; color: #777777; line-height: 18px;">
			<strong>Catatan:</strong> Sebelum melakukan konfirmasi pembayaran, pastikan Anda sudah melakukan pembayaran ke salah satu rekening GroupHub seperti yang tercantum di bawah ini:
		</div>
	</td>
</tr>
<tr>
	<td align="center">
		<div style="text-align; center; border: 1px solid #e9e9e9; background-color: #f5f5f5; display: inline-block; padding: 8px 16px; margin: 12px 0; line-height: 20px;">
			<strong>Bank Central Asia</strong> Cabang Surabaya <br>No. Rekening <strong>010-720-6888</strong> a/n <strong>PT Matahari Labs</strong>
		</div>
	</td>
</tr>

@stop