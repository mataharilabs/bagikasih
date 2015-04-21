@extends('bagikasih.theme.templating')
@section('header') 
	@parent
	@include('bagikasih.theme.header') 
	@include('bagikasih.theme.header-of-slider')
@stop
@section('navbar') @include('bagikasih.theme.navbar') @stop
@section('sidebar')

{{ HTML::style('css/eventDetail.css') }}

<script type="text/javascript">
  
  var type_id   = '{{ $social_target->id }}';
  var type_name = 'social_targets';

</script>

{{ HTML::script('js/report.js') }}
<!-- Container  - mulai-->
<div class="container">


	
	<!-- Headline  - mulai-->
	<div class="row">
		<div class="col-lg-12"  align="center">

			<div class="page-header">
			@if(Session::has('gagal'))
			<div class="alert alert-danger" id="gagal" role="alert" >
			    {{ Session::get('gagal') }}
			</div>
			@endif

			@if(Session::has('sukses'))
			<div class="alert alert-success" id="sukses" role="alert" >
			    {{ Session::get('sukses') }}
			</div>
			@endif
				<h2 id="navbar">{{ $social_target->name }}</h2>
				<p><a href="{{ URL::route('temukan-target-sosial') }}">Target Sosial</a> - <a href="{{ URL::route('temukan-target-sosial') . '?category=' . $social_target->category->id }}">{{ $social_target->category->name }}</a></p>
			</div>

		</div>
	</div>
	<!-- Headline - selesai-->

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-12 hidden-xs">

			<p><img src="{{ url('photos') }}/{{ $social_target->cover_photo_id ? $social_target->cover_photo_id : 'default-cover' }}.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>

		</div>

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
			<div class="panel panel-default">
				<div class="panel-body">

					<p><a href="{{ Auth::check() ? '#modal-donation' : '#modal-signin' }}" data-toggle="modal" class="btn btn-primary btn-lg" style="width:100%;"><i class="fa fa-gift fa-lg"></i> Beri Donasi Langsung</a></p>              
					<p>Donasi Terkumpul</p>
					<h3>{{ $social_target->currency }} {{ number_format($social_target->total_donation,0,',','.') }}</h3>
					<a href="{{ Auth::check() ? '#myModal' : '#modal-signin' }}" data-toggle="modal" class="btn btn-success btn-lg" style="width:100%;"><i class="fa fa-group fa-lg"></i>  Buat Aksi Sosial</a>
					
					<br />
		          	<br />
		          	<a href="#reportModal" data-toggle="modal" class="btn btn-warning btn-lg" style="width:100%;"><i class="fa fa-book fa-lg"></i> Laporkan Target sosial</a>
					<p>
						<center>Share Target Sosial Ini:
						<!-- Go to www.addthis.com/dashboard to customize your tools -->
						<div class="addthis_sharing_toolbox"></div>
						</center>
					</p>

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		
		<!-- Photo Slider -->
		@include('bagikasih.photo-slider')
		<!-- Photo Slider - Selesai -->

		<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">

					<ul class="nav nav-tabs">
						<li class="active"><a href="#tentang" data-toggle="tab">Tentang Target Sosial</a></li>
						<li><a href="#profile" data-toggle="tab">Kepengurusan</a></li>
					</ul>
					
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="tentang">
							<p><i class="fa fa-map-marker"></i> {{ $social_target->address }} ({{ $social_target->city->name }})</p>
							<p>{{ $social_target->description }}</p>

						</div>
						<div class="tab-pane fade" id="profile">
							<p>{{ $social_target->stewardship }}</p>
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-lg-12">

			<div class="page-header">
	  			<h2 id="navbar">Daftar Aksi Sosial untuk "{{ $social_target->name }}"</h2>
			</div>

		</div>
	</div>

	<!-- Social Action List -->
	@include('bagikasih.social-action.list')
	<!-- Social Action List - Selesai -->

  	@include('bagikasih.modal.report')

  	@include('bagikasih.modal.aksisocial')

<!-- Container  - selesai-->
</div>

<!-- Modal Donation -->
@include('bagikasih.modal.donation')

@stop
@section('footer')
	@parent
	@include('bagikasih.theme.footer')
	@include('bagikasih.theme.footer-of-slider')
@stop