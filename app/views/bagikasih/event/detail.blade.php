@extends('bagikasih.theme.templating')
@section('header') 
	@parent
	@include('bagikasih.theme.header') 
	@include('bagikasih.theme.header-of-slider')
@stop
@section('navbar') @include('bagikasih.theme.navbar') @stop
@section('sidebar')

<!-- Container  - mulai-->
<div class="modal fade text-center" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">MEMBUAT AKSI SOSIAL</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <fieldset>
            <div class="form-group">
              <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 text-center">
                <i class="fa fa-group fa-5x"></i>
              </div>
              <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 text-left">
                <p>Hello, <b>Rotary Club!</b></p>
                <p>Anda akan membuat aksi sosial pada event,<br><b>Pertamina Bazzar Day</b></p>
              </div>
            </div>
            <p>Pilih target sosial untuk aksi sosial Anda</p>
            <div class="form-group text-left">
              <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Aksi sosial untuk:</label>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5">
                <select class="form-control" id="select">
                  <option>Panti Asuhan</option>
                  <option>Panti Jompo</option>
                  <option>Yayasan Difabel</option>
                  <option>Biaya Pengobatan</option>
                  <option>Lembaga Sosial</option>
                </select>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7">
                <select class="form-control" id="select">
                  <option>Panti Asuhan Christopherus</option>
                  <option>Panti Asuhan Mifakhul Jannah</option>
                  <option>Panti Asuhan Vincentius Putri</option>
                  <option>Rotary CLub</option>
                </select>
              </div>
            </div>
            <hr>Detail tentang aksi sosial <p>
            <div class="form-group text-left">
              <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Nama aksi</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input class="form-control" type="text" placeholder="Misal: Perbaikan meja belajar untuk Panti...">
              </div>
            </div>
            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Butuh dana</label>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5">
                <select class="form-control" id="select">
                  <option>Rupiah (IDR)</option>
                  <option>$ Dollar (USD)</option>
                </select>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
                  <input class="form-control" type="fname" placeholder="100.000">
                </div>
              </div>
            </div>
            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Donasi anda </label>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5">
                <select class="form-control" id="select">
                  <option>Rupiah (IDR)</option>
                  <option>$ Dollar (USD)</option>
                </select>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
                  <input class="form-control" type="fname" placeholder="100.000">
                </div>
              </div>
            </div>
            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Deskripsi</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <textarea class="form-control" rows="3" id="textArea">Tulis deksripsi aksi sosial Anda di sini</textarea>
              </div>
            </div>
            <style>
            .btn-file {
            	position: relative;
            	overflow: hidden;
            }

            .btn-file input[type=file] {
            	position: absolute;
            	top: 0;
            	right: 0;
            	min-width: 100%;
        	    min-height: 100%;
    	        font-size: 100px;
	            text-align: right;
            	filter: alpha(opacity=0);
           		opacity: 0;
            	background: red;
            	cursor: inherit;
            	display: block;
            }
            input[readonly] {
            	background-color: white !important;
            	cursor: text !important;
            }
            </style>
            <script>
            $(document).on('change', '.btn-file :file', function() {
            
            var input = $(this),
            	numFiles = input.get(0).files ? input.get(0).files.length : 1,
            	label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            	input.trigger('fileselect', [numFiles, label]);
            });

            $(document).ready( function() {
            
            	$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
	            
		            var input = $(this).parents('.input-group').find(':text'),
		            log = numFiles > 1 ? numFiles + ' files selected' : label;
		            
		            if( input.length ) {
		         	   input.val(log);
		            } else {
		            	if( log ) alert(log);
		            }
	            
	            });
            });
            </script>

            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Foto aksi</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="input-group">
                  <span class="input-group-btn">
                  <span class="btn btn-primary btn-file">
                  Browse&hellip; <input type="file" multiple>
                  </span>
                  </span>
                  <input type="text" class="form-control" readonly>
                </div>
                <span class="help-block">
                Anda dapat memilih lebih dari 1 gambar untuk dijadikan gallery
                </span>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <div class="checkbox text-left">
                  <label>
                    <input type="checkbox" disabled="" checked=""> Saya/kami akan melaksanakan aksi sosial ini setelah dana terkumpul dan bersedia
                    membuat dokumentasi dan lembar pertanggung jawab dari kegiatan sosial ini
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa fa-group"></i>  Buat Aksi Sosial</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Aksi - Selesai -->
<!-- Modal Donate - Mulai -->
<div class="modal fade text-center  " id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">MEMBERI DONASI</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <fieldset>
            <div class="form-group">
              <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 text-center">
                <i class="fa fa-gift fa-5x"></i>
              </div>
              <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 text-left">
                <p>Hello, <b>Rotary Club!</b></p>
                <p>Anda akan berdonasi untuk:<br><b>Perbaikan Fasilitas Panti Vincentius</b></p>
              </div>
            </div>
            <hr>Tentukan besar donasi anda kepada Panti Asuhan Vincentius Putri<p>
            
            <div class="form-group">
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
                <select name='kurs' class="form-control" id="select">
                  <option>Rupiah (IDR)</option>
                  <option>$ Dollar (USD)</option>
                </select>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-7">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
                  <input class="form-control" type="text" placeholder="100.000" name="nominal">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <textarea class="form-control" rows="3" id="textArea" name="komentar">Tulis sebuah pesan atau komentar di sini</textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <div class="checkbox text-left">
                  <label>
                    <input type="checkbox" > Saya ingin donasi saya tidak mencantumkan nama
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa fa-gift"></i>  Donasikan</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Donate - Selesai -->
<!-- Container  - mulai-->
<div class="container">
  <!-- Headline  - mulai-->
  <div class="row">
    <div class="col-lg-12"  align="center">
      <div class="page-header">
        <h2 id="navbar">{{ $view[0]['name']}} </h2>
        <p><a href="{{ URL::route('temukan-event') }} ">Event</a></p>
      </div>
      
    </div>
  </div>
  <!-- Headline - selesai-->
  <div class="row">
    
	<!-- Photo Slider -->
	@include('bagikasih.photo-slider')
	<!-- Photo Slider - Selesai -->
    
    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tentang" data-toggle="tab">Tentang Event</a></li>
            <li><a href="#profile" data-toggle="tab">Kepengurusan</a></li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="tentang">
              <p><h3>Date: 06 May 2015</h3><br>
              Location: {{ $view[0]['location']}}<br>
              Website:  {{ $view[0]['website_url']}}<br>
              Email:  {{ $view[0]['email']}}</p>
              <p>{{ $view[0]['description']}} </p>
            </div>
            <div class="tab-pane fade" id="profile">
              <p>{{ $view[0]['stewardship']}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
      <div class="panel panel-default">
        <div class="panel-body">
          @if(!empty($view[0]['website_url']))
            <p><a href="{{ $view[0]['website_url']}}" class="btn btn-primary btn-lg" style="width:100%;"><i class="fa fa-globe fa-lg"></i> Kunjungi Web</a></p>
          @endif
          <a href="#myModal" data-toggle="modal" class="btn btn-success btn-lg" style="width:100%;"><i class="fa fa-group fa-lg"></i>  Buat Aksi Sosial</a>
          <p><center>Share Event Ini:
          <!-- Go to www.addthis.com/dashboard to customize your tools -->
          <div class="addthis_sharing_toolbox"></div>
          </center></p>
        </div>
      </div>
    </div>
  </div>
	@include('bagikasih.social-action.list')
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