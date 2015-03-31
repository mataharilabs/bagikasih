@extends('bagikasih.theme.templating')
@section('header') @include('bagikasih.theme.header') @stop
@section('navbar') @include('bagikasih.theme.navbar') @stop
@section('sidebar')
<div class="splash">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <br><br><br><br>
        <br><br><br><br>
        <h1>Cara Baru Berdonasi</h1>
        <h2>Cari Lembaga Sosial & Berikan Donasi Anda</h2>
        <p><a href="#" class="btn btn-primary ">Cara Kerja</a> <a href="#" class="btn btn-primary ">Berikan Donasi</a></p>
        <br><br><br><br>
      </div>
    </div>
  </div>
</div>
<!-- Modal Log In - Mulai -->
<div class="modal fade text-center  bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Log In</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" onSubmit="return login(this);">
          <fieldset>
            <!-- <a class="btn btn-block btn-social btn-twitter">
              <i class="fa fa-twitter"></i>
              Sign in with Twitter
            </a>
            <a class="btn btn-block btn-social btn-facebook">
              <i class="fa fa-facebook"></i>
              Sign in with Facebook
            </a> -->
            <hr>Log in dengan akun terdaftar<p>
            <div class="form-group">
              <div class="col-lg-12">
                <div class="input-group margin-bottom-sm">
                  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                  <input class="form-control" type="text" name="email" placeholder="Email address">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                  <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-6">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Ingat saya
                  </label>
                </div>
              </div>
              <div class="col-lg-6">
                <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa fa-sign-in"></i> Log In</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        Tidak punya akun? <a href="#myModal2" data-toggle="modal" data-dismiss="modal">Daftar</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal Log In - Selesai -->
<!-- Modal Sign Up - Mulai -->
<div class="modal fade text-center  " id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Daftar</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <fieldset>
            <!-- <div class="form-group">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:5px;">
                <a class="btn btn-block btn-social btn-twitter">
                  <i class="fa fa-twitter"></i>
                  Sign Up with Twitter
                </a>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a class="btn btn-block btn-social btn-facebook">
                  <i class="fa fa-facebook"></i>
                  Sign Up with Facebook
                </a>
              </div>
            </div> -->
            <hr>Daftar akun baru<p>
            
            <div class="form-group">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  style="padding-bottom:5px;">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
                  <input class="form-control" type="fname" placeholder="Nama Depan">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
                  <input class="form-control" type="lname" placeholder="Nama Belakang">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  style="padding-bottom:5px;">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                  <input class="form-control" type="text" placeholder="Alamat Email">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                  <input class="form-control" type="lname" placeholder="No. Telepon">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  style="padding-bottom:5px;">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                  <input class="form-control" type="password" placeholder="Password">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                  <input class="form-control" type="password" placeholder="Ulangi Password">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" disabled checked> Saya telah membaca dan menyetujui <a href="#">Syarat & Ketentuan BagiKasih.com</a>.
                  </label>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa fa-sign-out"></i>  Daftar</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        Sudah mempunyai akun? <a href="#myModal" data-toggle="modal" data-dismiss="modal">Log In</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal Sign Up - Selesai -->
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
        <div class="panel-body"><a href="#">
        <h2>PANTI ASUHAN</h2></a>
        <p><img src="/assets/assets/img/category/orphanage.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
        <p align="right"><a href="#">Lihat semuanya  <i class="fa fa-eye"></i></a> </p>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-body"><a href="#">
      <h2>YAYASAN DIFABEL</h2></a>
      <p><img src="/assets/assets/img/category/disable.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
      <p align="right"><a href="#">Lihat semuanya  <i class="fa fa-eye"></i></a> </p>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
  <div class="panel panel-default">
    <div class="panel-body"><a href="#">
    <h2>BIAYA PENGOBATAN</h2></a>
    <p><img src="/assets/assets/img/category/health.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
    <p align="right"><a href="#">Lihat semuanya  <i class="fa fa-eye"></i></a> </p>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="panel panel-default">
  <div class="panel-body"><a href="#">
  <h2>PANTI JOMPO</h2></a>
  <p><img src="/assets/assets/img/category/nursing.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
  <p align="right"><a href="#">Lihat semuanya  <i class="fa fa-eye"></i></a> </p>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="panel panel-default">
<div class="panel-body"><a href="#">
<h2>SELEBRITI SOSIAL</h2></a>
<p><img src="/assets/assets/img/category/celebrity.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
<p align="right"><a href="#">Lihat semuanya  <i class="fa fa-eye"></i></a> </p>
</div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="panel panel-default">
<div class="panel-body"><a href="#">
<h2>EVENT SOSIAL</h2></a>
<p><img src="/assets/assets/img/category/event.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
<p align="right"><a href="#">Lihat semuanya  <i class="fa fa-eye"></i></a> </p>
</div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="panel panel-default">
<div class="panel-body"><a href="#">
<h2>TANTANGAN SOSIAL</h2></a>
<p><img src="/assets/assets/img/category/challenge.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
<p align="right"><a href="#">Lihat semuanya  <i class="fa fa-eye"></i></a> </p>
</div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="panel panel-default">
<div class="panel-body"><a href="#">
<h2>LEMBAGA SOSIAL</h2></a>
<p><img src="/assets/assets/img/category/lembaga.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
<p align="right"><a href="#">Lihat semuanya <i class="fa fa-eye"></i></a> </p>
</div>
</div>
</div>
<div class="col-lg-12">
<p align="center"><a href="#" class="btn btn-primary btn-md">Lihat Semua Aksi Sosial</a></p>
</div>
</div>
</div>
{{ HTML::script('js/credential.js'); }}
@stop
@section('footer')
@include('bagikasih.theme.footer')
@stop