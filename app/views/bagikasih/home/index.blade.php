@extends('bagikasih.theme.v2.layout')
@section('header') @include('bagikasih.theme.v2.header') @stop
@section('navbar') @include('bagikasih.theme.v2.navbar') @stop
@section('sidebar')

<div class="navbar-help">&nbps;</div>

<!-- header -->
<header class="header">
  <div class="header-imagery">
    <img src="/assets/assets/img/header/heart-in-your-hands.jpg">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-sm-offset-6 header-text">
        <h1>Cara Baru Berdonasi</h1>
        <span >Cari Lembaga Sosial & Berikan Donasi Anda</span>
        <div class="header-buttons">
          <button type="button" class="btn btn-outline" id="pelajari">Pelajari Lebih Lanjut</button>
          <span class="text-center">atau langsung</span>
          <a href="aksi-sosial" class="btn btn-primary" id="beri">Berikan Donasi</a>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- end of header -->

<!-- main content -->
<div class="main-content">
  <div class="container">
    <h1 class="text-center">Situs dimana kamu bisa melakukan aksi nyata terhadap kehidupan sosial di dalam maupun di luar lingkungan anda dengan cara yang mudah dan mengasyikkan</h1>

      @if(count($service))
      <div class="showbar">

        <div class="showbar-inner clearfix">
        @foreach($service as $key)
          <div class="card item">
            <div class="card-inner">
              <div class="card-head">
                <a href="{{ $key['loop'] == 'Social Action' ? 'aksi-sosial/'.$key['slug'] : 'target-sosial/'.$key['slug'] }}" class="card-cover" style="background: transparent url(photos/{{ empty($key['default_photo_id']) || $key['default_photo_id'] == 0 ? 'default.jpg' : $key['default_photo_id'] }}.jpg);">
                </a>
                <a href="{{ $key['loop'] == 'Social Action' ? 'aksi-sosial/'.$key['slug'] : 'target-sosial/'.$key['slug'] }}" class="card-author">
                  <img src="photos/{{ empty($key['default_photo_id']) || $key['default_photo_id'] == 0 ? 'default.jpg' : $key['default_photo_id'] }}.jpg" class="author-pic">
                  <span class="author-name">{{ $key['user']['firstname']." ".$key['user']['lastname'] }}</span>
                </a>
              </div>
              <div class="card-body">
                <a class="card-title" href="#">  {{ $key['name'] }}</a>
                <?php
                  $percentage = 0;
                  if($key['loop'] == 'Social Action'){
                    if($key['total_donation_target'] != 0){
                      $percentage = ($key['total_donation'] / $key['total_donation_target']) * 100;
                    }
                  }
                  else{
                    if($key['total_running_social_actions'] != 0){
                      $percentage = ($key['total_donation'] / $key['total_running_social_actions']) * 100;
                    }
                  }
                ?>

                <div class="card-stats clearfix">
                  <div class="progress progress-striped @if ($key['expired_at'] > time()) active @endif">
                    <!-- <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%;">
                      <span class="sr-only">80% Complete</span>
                    </div> -->
                    @if ($percentage < 100)
                    <div class="progress-bar progress-bar-success" style="width: {{$percentage}}%"></div>
                    @else
                    <div class="progress-bar" style="width: 100%"></div>
                    @endif
                  </div>
                  <div class="card-stats-text">
                    <p class="card-stats-hilite">Terkumpul <strong>IDR {{ number_format($key['total_donation'],2,",",".") }}</strong></p>
                    @if($key['loop'] == 'Social Action')
                      <p class="card-stats-lolite">Dari target donasi <strong>IDR {{ number_format($key['total_donation_target'],2,",",".") }}</strong></p>
                    @else
                      <p class="card-stats-lolite">Dari target donasi <strong>IDR {{ number_format($key['total_running_social_actions'],2,",",".") }}</strong></p>
                    @endif
                  </div>
                  <!-- <div class="card-stats-symbol text-center">
                    <i class="fa fa-users"></i>
                    <span>20</span>
                  </div> -->
                </div>
                <p>
                  {{ $key['description'] }}
                </p>
              </div>
              <div class="card-footer">
                <i class="fa fa-map-marker"></i>&nbsp;{{ $key['city']['name'] }}
              </div>
            </div>
          </div>
        @endforeach
        </div>
          <div class="showbar-pagination clearfix">
            <div class="showbar-pagination-buttons pull-right">
              <a class="prev"><i class="fa fa-chevron-left"></i></a>
              <a class="next"><i class="fa fa-chevron-right"></i></a>
            </div>
          </div>
      </div>
      @else
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Info</span>
            Aksi Sosial Dan Target Sosial belum tersedia
        </div>
      @endif

    <h1 class="text-center" id="mari"><span style="font-size: 42px;">Mari Wujudkan Aksi Sosial</span><br>Menjadi lebih berarti dengan aksi sosial untuk berbagai kategori sosial di bawah ini.</h1>

    <div class="container">
  <div class="row">
    <div class="col-lg-12" align="center">
      <h2>Mari Wujudkan Aksi Sosial </h2>
      <h3>Menjadi lebih berarti dengan aksi sosial untuk berbagai kategori sosial di bawah ini.</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body"><a href="{{ URL::to('target-sosial?category=1') }}">
        <h2>PANTI ASUHAN</h2></a>
        <p><a href="{{ URL::to('target-sosial?category=1') }}"><img src="/assets/assets/img/category/orphanage.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></a></p>
        <p align="right"><a href="{{ URL::to('target-sosial?category=1') }}">Lihat semuanya  <i class="fa fa-eye"></i></a> </p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-body"><a href="{{ URL::to('target-sosial?category=3') }}">
      <h2>YAYASAN DIFABEL</h2></a>
      <p><a href="{{ URL::to('target-sosial?category=3') }}"><img src="/assets/assets/img/category/disable.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></a></p>
      <p align="right"><a href="{{ URL::to('target-sosial?category=3') }}">Lihat semuanya  <i class="fa fa-eye"></i></a> </p>
    </div>
  </div>
</div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-body"><a href="{{ URL::to('aksi-sosial?category=1') }}">
      <h2>BIAYA PENGOBATAN</h2></a>
      <p><a href="{{ URL::to('aksi-sosial?category=1') }}"><img src="/assets/assets/img/category/health.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></a></p>
      <p align="right"><a href="{{ URL::to('aksi-sosial?category=1') }}">Lihat semuanya  <i class="fa fa-eye"></i></a> </p>
    </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body"><a href="{{ URL::to('target-sosial?category=2') }}">
        <h2>PANTI JOMPO</h2></a>
        <p><a href="{{ URL::to('target-sosial?category=2') }}"><img src="/assets/assets/img/category/nursing.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></a></p>
        <p align="right"><a href="{{ URL::to('target-sosial?category=2') }}">Lihat semuanya  <i class="fa fa-eye"></i></a> </p>
      </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body"><a href="{{ URL::to('selebriti-sosial') }}">
          <h2>SELEBRITI SOSIAL</h2></a>
          <p><a href="{{ URL::to('selebriti-sosial') }}"><img src="/assets/assets/img/category/celebrity.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></a></p>
          <p align="right"><a href="{{ URL::to('selebriti-sosial') }}">Lihat semuanya  <i class="fa fa-eye"></i></a> </p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body"><a href="{{ URL::to('event?category=2') }}">
          <h2>EVENT SOSIAL</h2></a>
          <p><a href="{{ URL::to('event?category=2') }}"><img src="/assets/assets/img/category/event.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></a></p>
          <p align="right"><a href="{{ URL::to('event?category=2') }}">Lihat semuanya  <i class="fa fa-eye"></i></a> </p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body"><a href="{{ URL::to('event?category=3') }}">
          <h2>TANTANGAN SOSIAL</h2></a>
          <p><a href="{{ URL::to('event?category=3') }}"><img src="/assets/assets/img/category/challenge.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></a></p>
          <p align="right"><a href="{{ URL::to('event?category=3') }}">Lihat semuanya  <i class="fa fa-eye"></i></a> </p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body"><a href="{{ URL::to('target-sosial?category=4') }}">
          <h2>LEMBAGA SOSIAL</h2></a>
          <p><a href="{{ URL::to('target-sosial?category=4') }}"><img src="/assets/assets/img/category/lembaga.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></a></p>
          <p align="right"><a href="{{ URL::to('target-sosial?category=4') }}">Lihat semuanya <i class="fa fa-eye"></i></a> </p>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <p align="center"><a href="{{ URL::route('temukan-aksi-sosial') }}" class="btn btn-primary btn-md">Lihat Semua Aksi Sosial</a></p>
    </div>
  </div>
</div>
    <!-- <div class="cat-hilite clearfix">
      <div class="cat-item cat-rect-v">
        <div class="cat-cover" style="background: url(http://placeimg.com/500/250/any);">
          <div class="cat-text">
            Panti Asuhan
          </div>
          <div class="cat-hover text-center">
            <p>Create an online fundraising page for your next race or event.</p>
            <button type="button" class="btn btn-primary">Lihat Semuanya</button>
          </div>
        </div>
      </div>
      <div class="cat-item">
        <div class="cat-cover" style="background: url(http://placeimg.com/250/250/any);">
          <div class="cat-text">
            Biaya Pengobatan
          </div>
          <div class="cat-hover text-center">
            <p>Create an online fundraising page for your next race or event.</p>
            <button type="button" class="btn btn-primary">Lihat Semuanya</button>
          </div>
        </div>
      </div>
      <div class="cat-item pull-right cat-rect-h">
        <div class="cat-cover" style="background: url(http://placeimg.com/250/500/any);">
          <div class="cat-text">
            Selebriti Bakti Sosial
          </div>
          <div class="cat-hover text-center">
            <p style="padding-top: 130px">Create an online fundraising page for your next race or event.</p>
            <button type="button" class="btn btn-primary">Lihat Semuanya</button>
          </div>
        </div>
      </div>
      <div class="cat-item">
        <div class="cat-cover" style="background: url(http://placeimg.com/250/250/any);">
          <div class="cat-text">
            Panti Jompo
          </div>
          <div class="cat-hover text-center">
            <p>Create an online fundraising page for your next race or event.</p>
            <button type="button" class="btn btn-primary">Lihat Semuanya</button>
          </div>
        </div>
      </div>
      <div class="cat-item cat-rect-v">
        <div class="cat-cover" style="background: url(http://placeimg.com/500/250/any);">
          <div class="cat-text">
            Yayasan Orang Berkebutuhan Khusus (Difabel)
          </div>
          <div class="cat-hover text-center">
            <p>Create an online fundraising page for your next race or event.</p>
            <button type="button" class="btn btn-primary">Lihat Semuanya</button>
          </div>
        </div>
      </div>
    </div>

    <h2 class="text-center">Ingin mencari dengan kategori yang lain? <a href="#">Lihat semua kategori</a></h2>
  </div> -->

  <div class="testi-wrap visible-md">
    <div class="container">
      <blockquote>
        <p>
          "Bagikasih is a groundbreaking online fundraising platform."
          <span><strong>Rusty Robertson</strong>  | Co-Founder, Stand Up 2 Cancer</span>
        </p>
      </blockquote>
    </div>
  </div>
  <hr class="hidden-md">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1">
      <h1 class="text-center" style="font-size: 42px;">Kenapa anda harus memilih BagiKasih</h1>
      <p class="text-center" style="font-size: 20px; line-height: 28px; color: #777;">bagikasih is about giving back, raising lots of money for great causes and having the most fun in the world while doing it. And, here's a <a href="#">pic of a napkin.</a></p>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6 y-us">
            <h2>Best Pricing Guarantee</h2>
            <p>3% guaranteed pricing and fastest access to your funds. Nearly every other site charges 8%. learn more</p>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 y-us">
            <h2>No Goal Requirements</h2>
            <p>keep the money you raise whether you beat your goal or not. No deadlines</p>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 y-us">
            <h2>Raise 3x More</h2>
            <p>raise 3x more money and crush your fundraising goal with our proven, easy fundraising ideas</p>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 y-us">
            <h2>Earn BagiKasih Impact Points</h2>
            <p>Earn points when you raise money or give to a cause. It's the only rewards program in the giving world</p>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 y-us">
            <h2>Most Trusted</h2>
            <p>The Red Cross, UNICEF, Boston Marathon, Ironman and millions of individuals use BagiKasih</p>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-6 y-us">
            <h2>Your Charitable Life</h2>
            <p>Show the world your charitable impact. Get your own homepage for all your fundraisers and donations</p>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center" style="margin: 20px auto;">
      <a href="buat-aksi-sosial" class="btn btn-primary btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mulai Segera&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    </div>
  </div>
</div>
<!-- end of main content -->
<div class="footer text-center">
  <ul class="list-inline">
    <li><a href="tentang-kami">Tentang Kami</a></li>
    <li><a href="bantuan">Bantuan</a></li>
    <li><a href="daftarkan-target-sosial">Daftarkan Target Sosial</a></li>
    <li><a href="daftarkan-event">Daftarkan Event</a></li>
    <li><a href="kontak-kami">Kontak Kami</a></li>
  </ul>
  <p>Copyright © 2015 <a href="#"><strong>Bagikasih.com</strong></a></p>
</div>



<?php
$currenturl = Request::url();
$currenturl = str_replace(URL(''), '', $currenturl);
$currenturl = str_replace('/', '_', $currenturl);
?>

<!-- Modal Signin & Signup - Mulai -->
  @include('bagikasih.modal.signin')
  @include('bagikasih.modal.signup')
<!-- Modal Signin & Signup - Selesai -->

<!-- {{ HTML::script('assets/components/bootstrap/dist/js/bootstrap.min.js'); }} -->
{{ HTML::script('js/credential.js'); }}
{{ HTML::script('assets/assets/js/bagikasih.js'); 

@stop