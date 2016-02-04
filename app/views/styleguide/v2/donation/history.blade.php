@extends('styleguide.v2.donation.donation-layout')

@section('header')
  @include('styleguide.v2.header')
@stop

@section('navbar')
  @include('styleguide.v2.navbar')
@stop

@section('container')

<div class="navbar-help donation-navbar-help">&nbps;</div>

<div class="container donation-history">
  
  <div class="row">
    <div class="col-sm-3">
      <div class="list-group" data-spy="affix" data-offset-top="71">
        <a href="#" class="list-group-item">Profile Setting</a>
        <a href="#" class="list-group-item">Account Setting</a>
        <a href="#" class="list-group-item">Social History</a>
        <a href="#" class="list-group-item active">Donation History</a>
      </div>
    </div>
    <div class="col-sm-9">
      <p>Kami telah mengirimkan email mengenai detail donasi aksi sosial Anda ke <strong>email@anda.com</strong>. Silahkan Melakukan pengiriman dana donasi ke rekening yang tecantum pada email yang telah kami kirim</p>
      <div class="card">
        <div class="card-inner">
          <div class="card-head">
            <h5 class="card-title">Donation History</h5>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Penerima</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Bakti Sosial GroupHub: Edisi Kemerdekaan RI yang ke 70</td>
                  <td>IDR 100.000</td>
                  <td>10 Aug 2015</td>
                  <td>Menunggu konfirmasi dari Anda</td>
                  <td><input type="checkbox"></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Bakti Sosial GroupHub: Edisi Hari Raya Qurban 2015</td>
                  <td>IDR 200.000</td>
                  <td>8 Aug 2015</td>
                  <td>Donasi berhasil</td>
                  <td></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Bakti Sosial GroupHub: Edisi Ramadhan 2015</td>
                  <td>IDR 200.000</td>
                  <td>20 Jun 2015</td>
                  <td>Donasi berhasil</td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>

@stop

@section('footer')
  @include('styleguide.v2.footer')
@stop