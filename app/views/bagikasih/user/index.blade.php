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
          <h2 id="navbar">Daftar Selebriti Sosial</h2>
          <p>Berikut adalah selebriti-selebriti yang sedang melakukan aksi sosial. Mari bersama dukung mereka agar aksi sosial tersebut bermanfaat bagi mereka yang membutuhkan.</p>
        </div>
        
      </div>
    </div>
	<!-- Headline - selesai-->

	@if (count($users))
		
		@foreach ($users as $i => $user)

			@if ($i % 4 == 0)
			<div class="row">
			@endif

			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<a href="{{ URL::route('lihat-profil', $user->slug) }}">
						<h2>{{ $user->firstname }} {{ $user->lastname }}</h2></a>
						<p>
							@if ($user->total_running_social_actions > 0)<span class="label label-success">{{ $user->total_running_social_actions }} Aksi sosial yang berjalan</span> @endif
						</p>
						<p>
							<a href="{{ URL::route('lihat-profil', $user->slug) }}">
							<img src="photos/{{ $user->default_photo_id ? $user->default_photo_id : 'default' }}.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></a>
						</p>
					</div>
				</div>
			</div>

			@if (($i+1) % 4 == 0)
			</div>
			@endif

		@endforeach

		@if (count($users) % 4 != 0)
		</div>
		@endif

	@else
	<div class="alert alert-info" role="alert">Data tidak ditemukan</div>

	@endif

</div>
<!-- Container - selesai-->

@stop
@section('footer')
@include('bagikasih.theme.footer')
@stop