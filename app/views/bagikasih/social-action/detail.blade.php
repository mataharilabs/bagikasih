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
            <li><a href="#profile" data-toggle="tab">Team</a></li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="tentang">
              <li class="dropdown" style="list-style-type:none">
                Oleh: <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 10px; padding-bottom: 10px;">Deny Setiawan </a>
                <ul class="dropdown-menu">
                  <li><center><img src="assets/img/ava.png" class="img-polaroid img-rounded" style="width:150px;height:150px;"></center></li>
                  <li><center>Top Philantropist</li>
                  <li><a href="#"><i class="fa fa-user fa-fw"></i> Lihat Profile</a></li>
                </ul>
                </li>Untuk: <a href="target-sosial">Panti Asuhan Vincentius Putri</a></p>
                Pada Event: <a href="event">Pertamina Bazzar Day</a></p>
                <p>Dekripsi proyek/Aksi penggalangan dana ini blablblabla endidikan puteri di Batavia yang pada masa itu hampir tidak ada. Pada 1 Agustus 1856 sekolah Ursulin pertama dibuka di Nordwijk, kini Jl. Juanda di seberang Istana Negara. Setahun sebelumnya, Pater H. van der Grinten, pastor kepala Katedral telah mengundang beberapa tokoh awam untuk mendirikan Vereeniging van de H. Vincentius a Paulo (Yayasan S. Vincentius dari Paul)</p>
                <p class="collapse" id="viewdetails">Pada 1 Agustus 1856 sekolah Ursulin pertama dibuka di Nordwijk, kini Jl. Juanda di seberang Istana Negara. Setahun sebelumnya, Pater H. van der Grinten, pastor kepala Katedral telah mengundang beberapa tokoh awam untuk mendirikan Vereeniging van de H. Vincentius a Paulo (Yayasan S. Vincentius dari Paul) guna memelihara semangat cinta kasih dengan mengamalkan tugas-tugas Kristiani dan perbuatan amal.<br><br>
                Mula-mula semua berjalan serba sederhana, karena kekurangan fasilitas dan anak sungguh membutuhkan bantuan, maka sebagian anak dititipkan pada keluarga Katolik yang diberi uang imbalan jika perlu. Baru pada 1 April 1862 disewa sebuah rumah untuk anak-anak perempuan di Bazaar Baroe (sekarang Pasar Baru) yang ditempati 25 anak. Belum dua tahun berlangsung uang tidak ada lagi. <br><br>
                Waktu penempatan anak puteri dalam beberapa keluarga Katolik sedang direncanakan, Suster Ursulin (OSU) menawarkan jalan keluar: para Suster menerima 24 anak puteri di rumah mereka Kleine Klooster di Jl. Pos 2, kini Biara St. Ursula. Rumah ini pada tahun 1871 terbakar habis dan anak-anak terpaksa hidup di rumah-rumah bambu sampai pada 1885 dibangun rumah untuk 80 anak.</p>
                <a href="#" data-toggle="collapse" data-target="#viewdetails">View more &raquo;</a>
              </div>
              <div class="tab-pane fade" id="profile">
                <p>Lorem Ipsum Kepengurusan</p>
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