@extends('emails.template')

@section('message')
	
<tr>
	<td>
		<h2 style="font-weight: normal; margin: 0px;">Halo {{ $recipient_name }},</h2>
		<p style="margin-top: 8px; font-size: 14px;">Berikut kami ingin memberitahukan bahwa :</p>
	</td>
</tr>
<tr>
	<td>
		<table width="100%" style="margin-top: 8px; font-size: 14px;">
			<tr>
				<td width="40%">Nama :</td>
				<td><b>{{ $donation->as_noname == 1 ? '<em>Anonim</em>' : $donation->user->firstname . ' ' . $donation->user->lastname}}</b></td>
			</tr>
			<tr>
				<td>Pada tanggal :</td>
				<td>{{ date('d M Y H:i', $donation->created_at->timestamp) }}</td>
			</tr>
			<tr>
				<td>Sebesar :</td>
				<td>{{ $donation->currency }} {{ number_format($donation->total, 2, ',', '.') }}</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td>
		<p style="margin-top: 8px; font-size: 14px;">memberikan donasi kepada Target Sosial yang Anda buat, yaitu :</p>
	</td>
</tr>
<tr>
	<td>
		<table width="100%" style="margin-top: 8px; font-size: 14px;">
			<tr>
				<td width="40%">Nama Target Sosial :</td>
				<td><a href="{{ route('lihat-target-sosial', $donation->type->slug) }}" style="font-weight: bold;">{{ $donation->type->name }}</a></td>
			</tr>
			<tr>
				<td>Alamat :</td>
				<td>{{ $donation->type->address }}</td>
			</tr>
			<tr>
				<td>No.Telp :</td>
				<td>{{ $donation->type->phone_number }}</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td>
		<br /><br />
		<p style="margin-top: 8px; font-size: 14px;">Tim BagiKasih akan menyampaikan bantuan tersebut langsung ke pihak terkait sesuai dengan kesepakatan yang telah dibuat sebelumnya.</p>
		<p style="margin-top: 8px; font-size: 14px;">Tim BagiKasih akan menambahkan foto-foto yang terkait dengan proses penyaluran donasi pada halaman profil dari Target Sosial tersebut.</p>
		<p style="margin-top: 8px; font-size: 14px;">Atas segala kerjasamanya kami mengucapkan terima kasih.</p>
	</td>
</tr>

@stop