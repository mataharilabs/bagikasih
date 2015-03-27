<?php include "temp/header.tpl"; ?> 


  </head>
  <body id="home">

<!-- ini nav bar - mulai-->
<?php include "temp/navbar-logged-in.tpl"; ?> 
<!-- ini nav bar - selesai-->


    <div class="container">

<!-- Headline  - mulai-->
        <div class="row">
          <div class="col-lg-12"  align="center">

            <div class="page-header">
              <h2 id="navbar">Membuat Aksi Sosial</h2>
              <p>Buat hidup lebih berarti dengan melakukan aksi sosial untuk membuat kehidupan lebih baik sekitar Anda.</p>
            </div>
            
          </div>
        </div>
<!-- Headline - selesai-->


        <div class="row">

          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="panel panel-default">

                <div class="panel-body">
                  Target sosial yang dipilih<p>
                  <a href="#"><h2>Panti Asuhan Christoperus</h2></a>
                  <p><img src="assets/img/institution/pa-christopherus.jpg" class="img-polaroid img-rounded" style="max-width:100%;height:auto;"></p>
                  <p><i class="fa fa-map-marker"></i> Semarang</p>
                </div>  

              </div>
          </div>

          <div class="col-lg-9">
              <div class="panel panel-default">

                <div class="panel-body">

                    <div class="col-lg-9">

              <form class="form-horizontal">
                <fieldset>

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


        </div>

    </div>

    <div class="container">
    <?php include "temp/footer.tpl"; ?> 
    </div>


    <script src="./components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/bootswatch.js"></script>
  </body>
</html>
