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
        <p class="errors-code">404</p>
        <hr>
        <p class="errors-body">
          <strong>Halaman tidak ditemukan,</strong><br>
          Maaf, ada sesuatu yang salah.
        </p>
        {{ Form::open(array('route' => 'temukan-aksi-sosial', 'method' => 'get')) }}
        <div class="input-group" style="margin: 12px 12px 26px;">
          <input type="text" name="q" placeholder="Cari aksi sosial lainnya.." class="form-control">
          <span class="input-group-btn">
            <button class="btn btn-primary">Go!</button>
          </span>
        </div>
        {{ Form::close() }}
        <a type="button" class="btn btn-default btn-md" href="{{route('home')}}">Kembali ke home</a>&nbsp;&nbsp;
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