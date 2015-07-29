{{ HTML::script('js/aksisocial.js') }}
<div class="modal fade text-center" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">MEMBUAT AKSI SOSIAL</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" id="failure" role="alert" style="display:none;">
        </div>
        <form class="form-horizontal" onsubmit="return createAksiSocial(this);">
          <fieldset>
            <div class="form-group">
              <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 text-center">
                <i class="fa fa-group fa-5x"></i>
              </div>
              <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 text-left">
                <p>Hello, <b></b></p>
                <p>Anda akan membuat aksi sosial pada event,<br>
                </p>
              </div>
            </div>
            <p>Pilih target sosial untuk aksi sosial Anda</p>
            <div class="form-group text-left">
              <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Aksi sosial untuk:</label>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5">
                <select class="form-control" id="social_target_id" name="social_target_id">
                  @foreach($social_target_id as $val)
                    <option value="{{ $val['id'] }}">{{ $val['name'] }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7">
                <select class="form-control" id="social_action_category_id" name="social_action_category_id">
                  @foreach($social_action_category_id as $val)
                    <option value="{{ $val['id'] }}">{{ $val['name'] }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <hr>Detail tentang aksi sosial <p>
            <div class="form-group text-left">
              <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label text-left">Nama aksi</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <input class="form-control" type="text" id="name" name="name" placeholder="Misal: Perbaikan meja belajar untuk Panti...">
              </div>
            </div>
            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Deskripsi</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <textarea class="form-control" rows="3" id="description" name="description"></textarea>
              </div>
            </div>
            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Kepengurusan</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <textarea class="form-control" rows="3" id="stewardship" name="stewardship"></textarea>
              </div>
            </div>
            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Deskripsi Bank Akun Donasi</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <textarea class="form-control" rows="3" id="bank_account_description" name="bank_account_description"></textarea>
              </div>
            </div>
            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Butuh dana</label>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-5">
                <select class="form-control" id="currency" name="currency">
                  <option value="IDR">Rupiah (IDR)</option>
                  <!-- <option value="USD">$ Dollar (USD)</option> -->
                </select>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
                  <input class="form-control" type="fname" id="total_donation_target" name="total_donation_target">
                </div>
              </div>
            </div>
            
            {{ HTML::style('cs/eventDetail.css') }}
            {{ HTML::script('js/eventDetail.js') }}

            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Foto Aksi social</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="input-group">
                  <span class="input-group-btn">
                  <span class="btn btn-primary btn-file">
                  Browse&hellip; <input type="file" name="file" id="file">
                  </span>
                  </span>
                  <input type="text" class="form-control" readonly>
                </div>
              </div>
            </div>

            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Cover Aksi Sosial</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="input-group">
                  <span class="input-group-btn">
                  <span class="btn btn-primary btn-file">
                  Browse&hellip; <input type="file" name="cover_photo_id" id="cover_photo_id">
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