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
                <p>Hello, <b>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}!</b></p>
                <p>Anda akan membuat aksi sosial pada event,<br>

                    <!-- 
                        Ini untuk event
                    -->
                    @if(isset($view))
                      <b>{{ $view[0]['slug'] }}</b>
                    @endif

                    <!-- 
                        Ini untuk social action
                    -->
                    @if(isset($social_action))
                      <b>{{ $social_action['slug'] }}</b>
                    @endif
                </p>
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
            
            {{ HTML::style('cs/eventDetail.css') }}
            {{ HTML::script('js/eventDetail.js') }}

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