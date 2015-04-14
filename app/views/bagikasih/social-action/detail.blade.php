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
        <h2 id="navbar">Penggalangan Dana Awal #2015</h2>
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
                Oleh: <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 10px; padding-bottom: 10px;">{{ $user['firstname'].' '.$user['lastname'] }} </a>
                <!-- <ul class="dropdown-menu">
                  <li><center><img src="assets/img/ava.png" class="img-polaroid img-rounded" style="width:150px;height:150px;"></center></li>
                  <li><center>Top Philantropist</li>
                  <li><a href="#"><i class="fa fa-user fa-fw"></i> Lihat Profile</a></li>
                </ul> -->
                </li>Untuk: <a href="target-sosial">{{ $social_target['name'] }}</a></p>
                Pada Event: <a href="event">Pertamina Bazzar Day</a></p>
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
            <h2>Rp 150.050.000</h2>
            <p>Terkumpul Dari Total: <br>Rp 500.000.000</p>
            <div class="progress progress-striped active">
              <div class="progress-bar progress-bar-success" style="width: 40%"></div>
            </div>
            <p><span class="label label-success">Still Running</span></p>
            <p><a href="#myModal" data-toggle="modal" class="btn btn-success btn-lg" style="width:100%;"><i class="fa fa-group fa-lg"></i> Buat Aksi Sosial Lain</a></p>
            <p><center>Share Aksi Sosial Ini:
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_sharing_toolbox"></div>
            </center></p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h2 id="navbar">Daftar Donatur</h2>
        </div>
        
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <p><img src="assets/img/ava.png" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
          <h2>Frans Yuwono</h2></a>
          mendonasikan
          <h4><b>Rp 100.000.000</h4></b>
          <p><i class="fa fa-clock-o"></i>17 Agustus 2014</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <p><img src="assets/img/ava.png" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
        <h2>Anonymous</h2></a>
        mendonasikan
        <h4><b>Rp 50.050.000</h4></b>
        <p><i class="fa fa-clock-o"></i> 30 Agustus 2014</p>
      </div>
    </div>
  </div>
</div>
</div>

@include('bagikasih.modal.donation')
@stop
  @section('footer')
@parent
  @include('bagikasih.theme.footer')
  @include('bagikasih.theme.footer-of-slider')
@stop