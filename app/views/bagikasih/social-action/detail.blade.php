@extends('bagikasih.theme.templating')
@section('header')
@parent
  @include('bagikasih.theme.header')
  @include('bagikasih.theme.header-of-slider')
@stop
  @section('navbar') @include('bagikasih.theme.navbar') @stop
@section('sidebar')

{{ HTML::style('assets/assets/css/idangerous.swiper.css') }}
{{ HTML::style('css/aksisocialDetail.css') }}
{{ HTML::script('js/aksisocialDetail.js') }}
{{ HTML::style('css/eventDetail.css') }}


<!-- Modal Aksi - Mulai -->
  @include('bagikasih.modal.aksisocial')
<!-- Modal Aksi - Selesai -->

<!-- Modal Donate - Mulai -->
  @include('bagikasih.modal.donation')
<!-- Modal Donate - Selesai -->


<!-- Container  - mulai-->
<div class="container">
  <!-- Headline  - mulai-->
  <div class="row">
    <div class="col-lg-12"  align="center">
      <div class="page-header">
        <h2 id="navbar">{{ $social_action['name'] }}</h2>
        <p><a href="#">Aksi Sosial</a>
      </div>
      
    </div>
  </div>
  <!-- Headline - selesai-->
  <div class="row">
    @include('bagikasih.photo-slider')

    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tentang" data-toggle="tab">Tentang Aksi Sosial</a></li>
            <li><a href="#profile" data-toggle="tab">Kepengurusan</a></li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="tentang">
              <li class="dropdown" style="list-style-type:none">
                Oleh: 
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 10px; padding-bottom: 10px;">{{ $social_action['user']['firstname'] }} </a>
                <ul class="dropdown-menu">
                  <li><center><img src="{{ $social_action['user']['default_photo_id'] == NULL ? '/photos/default.jpg' : '/photos/'.$social_action['user']['default_photo_id'].'.jpg' }}" class="img-polaroid img-rounded" style="width:150px;height:150px;"></center></li>
                  <li><center>{{ $social_action['user']['firstname'].' '.$social_action['user']['lastname'] }}</li>
                  <li><a href="{{ URL::route('lihat-profil',$social_action['user']['slug'])}}"><i class="fa fa-user fa-fw"></i> Lihat Profile</a></li>
                </ul>
                </li>Untuk: 
                <a href="{{ URL::route('lihat-target-sosial',$social_action['social_target']['slug'])}}">{{ $social_action['social_target']['name'] }}</a></p>
                Pada Event: <a href="event"></a></p>
                <p class="collapse" id="viewdetails">{{ $social_action['description'] }}</p>
                <a href="#" data-toggle="collapse" data-target="#viewdetails">View more &raquo;</a>
              </div>
              <div class="tab-pane fade" id="profile">
                <p>{{ $social_action['stewardship'] }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center">
        <div class="panel panel-default">
          <div class="panel-body">
            <p><a href="{{ Auth::check() ? '#modal-donation' : '#modal-signin' }}" data-toggle="modal" class="btn btn-primary btn-lg" style="width:100%;"><i class="fa fa-gift fa-lg"></i> Beri Donasi</a></p>
            <h2>{{ $social_action['currency'] == 'IDR' ? 'Rp.' : $social_action['currency'] }} {{ number_format($social_action['total_donation_target'], 2, ',', '.') }} </h2>
            <p>Terkumpul Dari Total: <br>{{ $social_action['currency'] == 'IDR' ? 'Rp.' : $social_action['currency'] }} {{ number_format($social_action['total_donation'], 2, ',', '.') }} </p>
            <div class="progress progress-striped @if ($social_action['expired_at'] > time()) active @endif">
              <?php
              $percentage = ($social_action['total_donation'] / $social_action['total_donation_target']) * 100;
              ?>

              @if ($percentage < 100)
              <div class="progress-bar progress-bar-success" style="width: {{$percentage}}%"></div>
              @else
              <div class="progress-bar" style="width: 100%"></div>
              @endif
            </div>
            <p>
              @if ($social_action['expired_at'] > time())
              <span class="label label-success"><i class="fa fa-spinner fa-spin"></i> Masih berjalan</span>
              @else
              <span class="label label-primary"><i class="fa fa-check-square"></i> Selesai</span>
              @endif
            </p>
            <p><a href="#myModal" data-toggle="modal" class="btn btn-success btn-lg" style="width:100%;"><i class="fa fa-group fa-lg"></i> Buat Aksi Sosial Lain</a></p>
            <p><center>Share Aksi Sosial Ini:
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_sharing_toolbox"></div>
            </center></p>
          </div>
        </div>
      </div>
    </div>
    @include('bagikasih.social-action.donation')
  </div>
</div>
</div>

@stop
  @section('footer')
@parent
  @include('bagikasih.theme.footer')
  @include('bagikasih.theme.footer-of-slider')
@stop