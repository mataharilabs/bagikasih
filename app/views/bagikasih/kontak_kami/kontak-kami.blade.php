@extends('styleguide.styleguide')
@section('header') @include('styleguide.header') @stop
@section('navbar') @include('styleguide.navbar') @stop
@section('sidebar')
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
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          Menu<p>
          <ul>
            <li><a href="tentang-kami">Tentang Kami</a></li>
            <li><a href="bantuan">Bantuan</a></li>
            <li><a href="daftarkan-target-sosial">Daftarkan Target Sosial</a></li>
            <li><a href="daftarkan-event">Daftarkan Event</a></li>
            <li><b>Kontak Kami</b></li>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="panel panel-default">
          <div class="panel-body">
            <h2 id="navbar">Kontak Kami</h2>
            <p>lorem ipsum dolor sit amen konten yang diutamakan </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
@section('footer')
@include('styleguide.footer')
@stop