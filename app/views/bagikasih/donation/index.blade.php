@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar') @include('bagikasih.theme.navbar') @stop
@section('sidebar')

<!-- Container  - mulai-->
<div class="container">

	<!-- Navbar   -->
	<div class="row">
		<div class="col-lg-12">

			<div class="page-header">
				<h2 id="navbar">Riwayat Donasi</h2>
				<p><a href="{{ URL::route('edit_profile') }}">Pengaturan Profil</a> • <a href="{{ URL::route('edit_settings') }}">Pengaturan Akun</a> • <a href="{{ URL::route('lihat-profil', Auth::user()->slug) }}#aksi-sosial">Riwayat Aksi Sosial</a> • Riwayat Donasi</p>
				<p>Profil BagiKasih Anda menunjukkan informasi yang lebih detail tentang profil Anda. Profil anda dapat menunjukkan kredibilitas Anda, sehingga orang lain ingin membantu aksi sosial yang anda buat. Jadi, pastikan untuk menggunakan foto profil yang baik, tuliskan cerita memukau tentang Anda</p>
			</div>

		</div>
	</div>

	<div class="row">
		<div class="panel-body col-lg-9 col-centered">
			<div class="panel panel-default">
				<div class="panel-body">

					<!-- general information col -mulai -->
					<div class="col-lg-12">
						<p>Kami telah mengirimkan e-mail mengenai detail donasi aksi sosial Anda ke <b>{{ Auth::user()->email }}</b>. Silahkan melakukan pengiriman dana donasi ke rekening yang tercantum pada email yang telah kami kirim.</p>

						<table class="table table-striped table-hover ">
							<thead>
								<tr>
									<th>No.</th>
									<th>Penerima</th>
									<th>Jumlah</th>
									<th>Tanggal</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($donations as $i => $donation)
								<?php
								// about donation status
								if ($donation->status == 0 and $donation->bank_name == null)
								{
									$status = 'Menunggu konfirmasi dari Anda';
									$can_deleted = true;
									$class = 'info';
								}
								else if ($donation->status == 0)
								{
									$status = 'Menunggu pemeriksaan dari admin';
									$can_deleted = false;
									$class = '';
								}
								else if ($donation->status == 1)
								{
									$status = 'Donasi berhasil';
									$can_deleted = false;
									$class = 'success';
								}
								?>
								<tr class="{{ $class }}">
									<td>{{ ($i+1) }}</td>
									<td>{{ $donation->type->name }}</td>
									<td>{{ $donation->currency }} {{ number_format($donation->total,0,',','.') }}</td>
									<td>{{ date('d M Y', $donation->created_at->timestamp) }}</td>
									<td>
										
										{{ $status }}
									</td>
									<td>
										@if ($can_deleted)
										<input type="checkbox" name="donations" id="donations" value="{{ $donation->id }}" checked>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table> 
		
						<div class="col-lg-9">
						</div>
		
						<div class="col-lg-3">
							<select class="form-control" id="action" name="action" onChange="action(this);">
								<option value="0" selected="selected">Aksi :</option>
								<option value="1">Konfirmasi Transfer</option>
								<option value="2">Batalkan Donasi</option>
							</select>
						</div>

					</div>
				</div>
			</div>
		</div>  

	</div>

<!-- Container  - selesai-->
</div>

@stop
@section('footer')
@include('bagikasih.theme.footer')
{{ HTML::script('js/donation-history.js'); }}
@stop