@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar') @include('bagikasih.theme.navbar') @stop
@section('sidebar')

<!-- Container  - mulai-->
<div class="container">

	<div class="row">
		<div class="col-lg-12"  align="center">
			<div class="page-header">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="panel-body col-lg-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<p><img style="max-width:100%;height:auto;" class="img-polaroid img-rounded" src="photos/{{ $user->default_photo_id ? $user->default_photo_id : 'default' }}.jpg"></p>
				</div>
			</div>
		</div>

		<div class="panel-body col-lg-9">
			<div class="panel panel-default">
				<div class="panel-body">

					<!-- general information col -mulai -->
					<div class="col-lg-9">
						<h3>{{ $user->firstname }} {{ $user->lastname }}</h3>
						<p>{{ $user->city->name }}</p>
						<hr>
						<h4>Tentang saya</h4>
						<p>
							{{ $user->description }}
						</p>

						<hr>
						<h4>Aktivitas Sosial</h4>
						<table class="table table-striped table-hover ">
							<thead>
								<tr>
									<th>Aktifitas</th>
									<th>Tanggal</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><b>Rotary Club</b> membuat kegiatan sosial <a>Donor Darah Bersama Untuk Bangsa</a></td>
									<td>16/09/14</td>
								</tr>
								<tr>
									<td><b>Rotary Club</b> donasi ke <a>Basarnas</a> untuk kegiatan sosial <a>Bagi-Bagi Sembako Ke Yayasan Tunanetra</a></td>
									<td>15/11/13</td>
								</tr>
								<tr>
									<td><b>Rotary Club</b> donasi langsung ke <a>Panti Vincentius Putri</a></td>
									<td>28/06/12</td>
								</tr>
								<tr class="success">
									<td><b>Rotary Club</b> bergabung dengan BagiKasih.com</td>
									<td>01/06/12</td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>

<!-- Container  - selesai-->
</div>

{{ HTML::script('js/credential.js'); }}
@stop
@section('footer')
@include('bagikasih.theme.footer')
@stop