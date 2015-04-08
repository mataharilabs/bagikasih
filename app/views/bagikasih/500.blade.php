@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar') @include('bagikasih.theme.navbar') @stop
@section('sidebar')

<div class="container" style="margin-top: 120px; width: 960px;">

  <div class="row">
    <div class="col-xs-12 col-sm-3"></div>
    <div class="col-xs-12 col-sm-6">
      <div class="errors text-center">
        <span>Oops, error</span>
        <p class="errors-code">500</p>
        <hr>
        <p class="errors-body">
          <strong>Internal Server Error,</strong><br>
          Maaf, ada sesuatu yang salah.
        </p>
        <a type="button" class="btn btn-default btn-md" href="{{route('home')}}">Kembali ke Home</a>&nbsp;&nbsp;
        <button type="button" class="btn btn-default btn-md" onclick="history.go(-1);">Kembali ke halaman sebelumnya</button>
      </div>
    </div>
    <div class="col-xs-12 col-sm-3"></div>
  </div>

</div>

@stop
@section('footer')
@include('bagikasih.theme.footer')
@stop