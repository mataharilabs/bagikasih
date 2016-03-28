@extends('styleguide.v2.donation.donation-layout')

@section('header')
  @include('styleguide.v2.header')
@stop

@section('navbar')
  @include('styleguide.v2.navbar')
@stop

@section('container')

<div class="navbar-help donation-navbar-help">&nbps;</div>

<div class="container donation-confirmed">
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4">
      <div class="card-body text-center">
        <h1 style="margin-top:0;">Mengesankan</h1>
        <i class="fa fa-smile-o fa-4x" style="color:#ED1848;"></i>
        <h3>Terima kasih</h3>
        <h5>Anda telah meng-konfirmasi donasi anda</h5>
        <p>Semoga dengan kedermawanan Anda, dapat berdampak langsung untuk mengurangi permasalahan - permasalahan sosial di sekitar kita. Dan juga, semoga selalu diliputi kebaikan serta kebahagiaan yang akan senantiasa menaungi Anda</p>
      </div>
    </div>
  </div>

  <nav class="donation-bottom-nav text-center">
    <div class="btn-group">
      <a href="#" class="btn btn-default">Aksi sosial lainnya</a>
      <div class="btn-group-gap">
        <span>atau</span>
      </div>
      <a href="#" class="btn btn-default">View Donation History</a>
    </div>
  </nav>

</div>

@stop

@section('footer')
  @include('styleguide.v2.footer')
@stop