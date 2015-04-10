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
				<p><a href="#">Edit Profile</a> • <a href="#">Account Settings</a> • <a href="#">Aksi Sosial</a> • History Donasi</p>
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
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($donations as $i => $donation)
								<tr>
									<td>{{ ($i+1) }}</td>
									<td>{{ $donation->type_name }}</td>
									<td>{{ $donation->currency }} {{ number_format($donation->total,0,',','.') }}</td>
									<td>{{ date('d M Y', $donation->created_at->timestamp) }}</td>
									<td>
										<?php
										// about donation status
										if ($donation->status == 0 and $donation->bank_name == null)
										{
											$status = 'Menunggu konfirmasi dari Anda';
										}
										else if ($donation->status == 0)
										{
											$status = 'Menunggu pemeriksaan dari admin';
										}
										else if ($donation->status == 1)
										{
											$status = 'Donasi berhasil';
										}
										?>
										{{ $status }}
									</td>
									<td><input type="checkbox" checked></td>
								</tr>
								@endforeach
							</tbody>
						</table> 
		
						<div class="col-lg-9">
						</div>
		
						<div class="col-lg-3">
							<select name="birthdate_month" class="form-control" id="select">
								<option value="1" selected="selected">Action</option>
								<option value="2">Konfirmasi Transfer</option>
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
@stop