@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar') @include('bagikasih.theme.navbar') @stop
@section('sidebar')

<!-- Container  - mulai-->
<div class="container">
	<!-- Headline  - mulai-->
	<div class="row">
		<div class="col-lg-12"  align="center">
			<div class="page-header">
			</div>

		</div>
	</div>
	<!-- Headline - selesai-->
	<div class="row">
		<div class="panel-body col-lg-12 col-centered">
			<div class="panel panel-default">
				<div class="panel-body">
				<div class="col-lg-12 text-center">
					<h2 id="navbar">Terima kasih</h2>
					<i class="fa fa-envelope fa-5x"></i>
					<h3>Email anda telah terkonfirmasi</h3>
					<p>Selamat beraksi sosial dan membuat perubahan bagi dunia</p>
					@if(!Auth::check())
					<p><a href="{{ URL::to('/login') }}">Login</a> ke akun anda</p>
					@else
					<p><a href="{{ URL::to('/') }}">Ke Halaman awal</a></p>
					@endif
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