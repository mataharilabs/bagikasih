@extends('styleguide.styleguide')
@section('header') @include('styleguide.header') @stop
@section('navbar') @include('styleguide.navbar-logged-in') @stop
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
                  <li><b>Tentang Kami</b></li>
                  <li><a href="bantuan">Bantuan</a></li>
                  <li><a href="daftarkan-target-sosial">Daftarkan Target Sosial</a></li>
                  <li><a href="daftarkan-event">Daftarkan Event</a></li>
                  <li><a href="kontak-kami">Kontak Kami</a></li>
                </div>  

              </div>
          </div>

          <div class="col-lg-9">
              <div class="panel panel-default">

                <div class="panel-body">


               <h2 id="navbar">BagiKasih.com dari kita untuk kehidupan dunia</h2>
              <p> Lorem ipsum dolor sit amet bla bla bla konten yang diutamakan Lorem ipsum dolor sit amet bla bla bla konten yang diutamakan Lorem ipsum dolor sit amet bla bla bla konten yang diutamakan </p>



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