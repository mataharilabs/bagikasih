<?php include "temp/header.tpl"; ?> 


    <!-- swiper styles -->
    <link href="assets/css/idangerous.swiper.css" rel="stylesheet" type="text/css">

      <style>
/* Demo Syles */
.arrow-left {
  background: url(assets/img/arrows.png) no-repeat left top;
  position: absolute;
  left: 50px;
  top: 50%;
  margin-top: -15px;
  width: 17px;
  height: 30px;
  z-index: 12;
}
.arrow-right {
  background: url(assets/img/arrows.png) no-repeat left bottom;
  position: absolute;
  right: 50px;
  top: 50%;
  margin-top: -15px;
  width: 17px;
  height: 30px;
  z-index: 12;
}
.swiper-container {
  height: 300px;
  width: 100%;
  left: 0px;
}
.content-slide {
  padding: 20px;
  color: #fff;
}
.title {
  font-size: 25px;
  margin-bottom: 10px;
}
.pagination {
  position: absolute;
  left: 0;
  text-align: center;
  width: 100%;
}
.swiper-pagination-switch {
  display: inline-block;
  width: 10px;
  height: 10px;
  border-radius: 10px;
  background: #999;
  box-shadow: 0px 1px 2px #555 inset;
  margin: 0 3px;
  cursor: pointer;
}
.swiper-active-switch {
  background: #fff;
}
  </style>

  <script>
  (function ($, window, delay) {
  // http://jsfiddle.net/AndreasPizsa/NzvKC/
  var theTimer = 0;
  var theElement = null;
    var theLastPosition = {x:0,y:0};
  $('[data-toggle]')
    .closest('li')
    .on('mouseenter', function (inEvent) {
    if (theElement) theElement.removeClass('open');
    window.clearTimeout(theTimer);
    theElement = $(this);

    theTimer = window.setTimeout(function () {
      theElement.addClass('open');
    }, delay);
  })
    .on('mousemove', function (inEvent) {
        if(Math.abs(theLastPosition.x - inEvent.ScreenX) > 4 || 
           Math.abs(theLastPosition.y - inEvent.ScreenY) > 4)
        {
            theLastPosition.x = inEvent.ScreenX;
            theLastPosition.y = inEvent.ScreenY;
            return;
        }
        
    if (theElement.hasClass('open')) return;
    window.clearTimeout(theTimer);
    theTimer = window.setTimeout(function () {
      theElement.addClass('open');
    }, delay);
  })
    .on('mouseleave', function (inEvent) {
    window.clearTimeout(theTimer);
    theElement = $(this);
    theTimer = window.setTimeout(function () {
      theElement.removeClass('open');
    }, delay);
  });
})(jQuery, window, 200); // 200 is the delay in milliseconds
</script>

  </head>
  <body id="home">

<!-- ini nav bar - mulai-->
<?php include "temp/navbar-logged-in.tpl"; ?> 
<!-- ini nav bar - selesai-->


<!-- Modal Aksi - Mulai -->

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
<p>Anda akan membuat aksi sosial untuk,<br><b>Panti Asuhan Vincentius Putri</b></p>
                    </div>
                  </div>


             <script type="text/javascript">
$(document).ready(function () {
         $('#div1').show();
         $('#div2').hide();
                    $('#id_radio1').click(function () {
                       $('#div2').hide('fast');
                       $('#div1').show('fast');
                });
                $('#id_radio2').click(function () {
                      $('#div1').hide('fast');
                      $('#div2').show('fast');
                 });
});
</script>

<p>Apa aksi sosial Anda untuk salah satu Event Sosial pada BagiKasih.com?</p>

                   <input id="id_radio1" checked type="radio" name="name_radio1" value="value_radio1" />Iya
                   <input id="id_radio2" type="radio" name="name_radio1" value="value_radio2" />Tidak

              <!-- div ya -->
              <div id="div1">

                  <div class="form-group text-left">

                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Pada event</label>
                     <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                      <select class="form-control" id="select">
                        <option>5 Mei 2015 - Charity Run Surabaya </option>
                        <option>1 Desember 2016 -  New Year Night Monas</option>
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

              </div>
              <!-- div ya -->

              <!-- div tidak -->
              <div id="div2">

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

                    <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Donasi anda</label>
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

              </div> 
              <!-- div tidak -->



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
<p>Anda akan donasi untuk:<br><b>Panti Asuhan Vincentius Putri</b></p>
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
              <h2 id="navbar">Panti Asuhan Vincentius Putri</h2>
              <p><a href="#">Target Sosial</a> - <a href="#">Panti Asuhan</a></p>
            </div>
            
          </div>
        </div>
<!-- Headline - selesai-->

    <div class="row">

          <div class="col-lg-8 col-md-8 col-sm-12 hidden-xs">

                  <p><img src="assets/img/banner.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>

          </div>

          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
              <div class="panel panel-default">
                <div class="panel-body">

              <p><a href="#myModal2" data-toggle="modal" class="btn btn-primary btn-lg" style="width:100%;"><i class="fa fa-gift fa-lg"></i> Beri Donasi Langsung</a></p>              
              <p>Donasi Terkumpul</p>
              <h3>Rp 150.050.000</h3>
              <a href="#myModal" data-toggle="modal" class="btn btn-success btn-lg" style="width:100%;"><i class="fa fa-group fa-lg"></i>  Buat Aksi Sosial</a>

<p><center>Share Target Sosial Ini:
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_sharing_toolbox"></div>
</center></p>

                </div>
              </div>
          </div>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-4 col-sm-6 hidden-xs">
              <div class="panel panel-default">
                <div class="panel-body">

    <a class="arrow-left" href="#"></a> 
    <a class="arrow-right" href="#"></a>
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide"> <img style="width:100%; height:100%;" class="img-polaroid img-rounded" src="assets/img/institution/pa-vputri.jpg"> </div>
        <div class="swiper-slide"> <img style="width:100%; height:100%;" class="img-polaroid img-rounded" src="assets/img/institution/pa-mjannah.jpg"> </div>
      </div>
    </div>
    <div class="pagination"></div>
  <script src="assets/js/idangerous.swiper-2.1.min.js"></script>
  <script>
  var mySwiper = new Swiper('.swiper-container',{
    pagination: '.pagination',
    loop:true,
    grabCursor: true,
    paginationClickable: true
  })
  $('.arrow-left').on('click', function(e){
    e.preventDefault()
    mySwiper.swipePrev()
  })
  $('.arrow-right').on('click', function(e){
    e.preventDefault()
    mySwiper.swipeNext()
  })
  </script>


                </div>
              </div>
          </div>

          <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-body">

              <ul class="nav nav-tabs">
                <li class="active"><a href="#tentang" data-toggle="tab">Tentang Lembaga</a></li>
                <li><a href="#profile" data-toggle="tab">Kepengurusan</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="tentang">
                  <p><i class="fa fa-map-marker"></i> Jalan Otto Iskandardinata No.76, Jakarta</p>
                  <p>Vikaris Apostolik Batavia ke-2, yaitu Mgr. Petrus M. Vrancken menyadari bahwa banyak muda-mudi Katolik tidak mendapat pelajaran umum dan pendidikan Katolik. Keadaan ini sangat menghalangi tumbuhnya umat Katolik yang bermutu dalam masyarakat Indo-Belanda yang sangat liberal dan hidup keagamaannya rendah sekali. Perlu pembaharuan dan usaha tambahan. Sudah lama Mgr. Vrancken surat-menyurat dengan Suster Ursulin di Sittard (Belanda) dan mengundang 
                    mereka untuk memulai pendidikan puteri di Batavia yang pada masa itu hampir tidak ada. </p>
                    Pada 1 Agustus 1856 sekolah Ursulin pertama dibuka di Nordwijk, kini Jl. Juanda di seberang Istana Negara. Setahun sebelumnya, Pater H. van der Grinten, pastor kepala Katedral telah mengundang beberapa tokoh awam untuk mendirikan<br><br>
          <p class="collapse" id="viewdetails">
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

        </div>


        <div class="row">
          <div class="col-lg-12">

            <div class="page-header">
              <h2 id="navbar">Daftar Aksi Sosial Untuk Panti Asuhan Vincentius Putri</h2>
            </div>

            
          </div>
        </div>


        <div class="row">

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <p><img src="assets/img/fundraiser/fund-1.jpg" class=" grayscale img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
                  <a href="#">
                  <h3>Perbaikan Fasilitas Panti Vincentius...</h3></a>
              <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-success" style="width: 40%"></div>
              </div>
                  <h4><b>Rp 100.050.000</h4></b>
                  <p>Terkumpul Dari Total:<br> Rp 500.000.000</p>                
                  <p><span class="label label-success"><i class="fa fa-spinner fa-spin"></i> Still Running</span></p>
                </div>
              </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <p><img src="assets/img/fundraiser/fund-2.jpg" class="grayscale img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
                  <a href="#">
                  <h3>Kunjungan Study / Belajar ke Malaysia...</h3></a>
              <div class="progress progress-striped">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <h4><b>Rp 50.000.000</h4></b>
                  <p>Terkumpul dari total Rp 50.000.000</p>                  
                  <p><span class="label label-primary"><i class="fa fa-check-square"></i> Completed</span></p>
                </div>
              </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <p><img src="assets/img/fundraiser/fund-1.jpg" class="grayscale img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
                  <a href="#">
                  <h3>Dana Untuk Fasilitas Panti Vincentius...</h3></a>
              <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-success" style="width: 40%"></div>
              </div>
                  <h4><b>Rp 100.050.000</h4></b>
                  <p>Terkumpul dari total Rp 500.000.000</p>
                  <p><span class="label label-success"><i class="fa fa-spinner fa-spin"></i> Still Running</span></p>
                </div>
              </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <p><img src="assets/img/fundraiser/fund-2.jpg" class="grayscale img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
                  <a href="#">
                  <h3>Kunjungan Study / Belajar ke Malaysia...</h3></a>
              <div class="progress progress-striped">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <h4><b>Rp 50.000.000</h4></b>
                  <p>Terkumpul dari total Rp 50.000.000</p>                  
                  <p><span class="label label-primary"><i class="fa fa-check-square"></i> Completed</span></p>
                </div>
              </div>
          </div>          

        </div>

    </div>

    </div>
<!-- Container - selesai-->

    <div class="container">
    <?php include "temp/footer.tpl"; ?> 
    </div>

  </body>
</html>
