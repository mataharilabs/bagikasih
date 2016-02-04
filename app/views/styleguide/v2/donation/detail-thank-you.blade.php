@extends('styleguide.v2.donation.donation-layout')

@section('header')
  @include('styleguide.v2.header')
@stop

@section('navbar')
  @include('styleguide.v2.navbar')
@stop

@section('container')

<div class="navbar-help donation-navbar-help">&nbps;</div>

<div class="container donation-detail">
  <div class="row">
    <div class="col-sm-8">
      <div class="donation-thx-wrap">
        <div class="donation-thx-icon">
          <i class="fa fa-thumbs-o-up fa-3x"></i>
        </div>
        <div class="donation-thx-body">
          <h1>Terima Kasih!</h1>
          <h4>Tinggal 1 langkah lagi untuk proses donasi</h4>
        </div>
      </div>

      <div>
        <p>
          Kami telah mengirimkan e-mail mengenai detail donasi aksi sosial Anda ke <strong>email@anda.com</strong>. Silahkan melakukan pengiriman dana donasi ke rekening yang tercantum pada email tersebut.
        </p>
      </div>

      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Donatur</th>
            <th>Penerima</th>
            <th>Jumlah Donasi</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>email@anda.com</td>
            <td>Nama Aksi Sosial</td>
            <td>IDR 1.000.000</td>
            <td><a href="#">Menunggu konfirmasi dari Anda</a></td>
          </tr>
        </tbody>
      </table>

      <p>
        Sosial setelah anda melakukan konfirmasi pengiriman dana donasi melaluli halaman <a href="3">Riwayat Donasi</a> atau melalui SMS langsung ke (+62) 81703930034
      </p>
      <p>
        Jika target dana aksi sosial ini tercapai, maka dana dukungan Anda akan disalurkan langsung kepada pihak yang bersangkutan.
      </p>
      <p>
        Hormat kami <br>
        Care, Love and Share.
      </p>
      <p>
        <strong>Tim Bagikasih</strong>
      </p>  

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
    <div class="col-sm-4">
      <div class="card card-donation-detail" data-spy="affix" data-offset-top="71">
        <div class="card-inner">
          <div class="card-head">
            <h5 class="card-title">Sekilas tentang aksi sosial ini</h5>
          </div>
          <div class="card-body">
            <a class="card-title" href="#">Customer metrics prototype learning curve</a>
            <div class="card-stats clearfix">
              <div class="progress progress-striped">
                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%;">
                  <span class="sr-only">80% Complete</span>
                </div>
              </div>
              <div class="card-stats-text">
                <p class="card-stats-hilite">Terkumpul <strong>IDR 25.000.<span>000</span></strong></p>
                <p class="card-stats-lolite">Dari total dana <strong>IDR 25.000.<span>000</span></strong></p>
              </div>
              <div class="card-stats-symbol text-center">
                <i class="fa fa-users"></i>
                <span>20</span>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <i class="fa fa-map-marker"></i>&nbsp;Surabaya, Jawa Timur
          </div>
        </div>
        <div class="share-to clearfix">
          <label>Share</label>
          <ul class="list-inline pull-right">
            <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a></li>
            <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a></li>
            <li><a href="#"><i class="fa fa-2x fa-google-plus-square"></i></a></li>
            <li><a href="#"><i class="fa fa-2x fa-envelope"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

@stop

@section('footer')
  @include('styleguide.v2.footer')
@stop