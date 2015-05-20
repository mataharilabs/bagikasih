@extends('styleguide.v2.layout')
@section('header') @include('styleguide.v2.header') @stop
@section('navbar') @include('styleguide.v2.navbar') @stop
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
          <button type="button" class="btn btn-outline">Pelajari Lebih Lanjut</button>
          <span class="text-center">atau langsung</span>
          <button type="button" class="btn btn-primary">Berikan Donasi</button>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- end of header -->

<div class="container">
  <h1 class="text-center">Situs dimana kamu bisa melakukan aksi nyata terhadap kehidupan sosial di dalam maupun di luar lingkungan anda dengan cara yang mudah dan mengasyikkan</h1>

  <div class="showbar clearfix">
    <div class="card">
      <div class="card-head">
        <div class="card-cover" style="background: transparent url(http://placeimg.com/640/480/any);">
          <div class="card-author">
            <img src="http://placeimg.com/46/46/any">
            <h3>Anderson Silva</h3>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h2>Customer metrics prototype learning curve</h2>
        <div class="card-stats">
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%;">
              <span class="sr-only">80% Complete</span>
            </div>
          </div>
        </div>
        <p>
          Gen-z responsive web design paradigm shift equity burn rate pitch sales infrastructure ecosystem.
          Disruptive holy grail value proposition long tail handshake lean startup buzz graphical user interface
          strategy release backing research & development founders
        </p>
      </div>
      <div class="card-footer">
        <i class="fa fa-map-marker"></i>&nbsp;Surabaya, Jawa Timur
      </div>
    </div>
  </div>

</div>

@stop