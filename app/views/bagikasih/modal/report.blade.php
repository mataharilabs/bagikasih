<div class="modal fade text-center" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Bantu kami memahami apa yang terjadi</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <fieldset>

            <p>Apa yang anda ingin lakukan dengan {{ str_replace('-',' ',Request::segment(1)) }} <b>{{ str_replace('-',' ',Request::segment(2)) }}</b>?</p>
            <div class="form-group text-left">
              <label class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Laporan</label>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <select class="form-control" name="subject_code" id="subject_code">
                  <option value="1">Pengajuan update data</option>
                  <option value="2">Pelaporan data palsu</option>
                  <option value="3">Lainnya</option>
                </select>
              </div>
            </div>
            
            <div class="form-group text-left">
              <label for="inputEmail" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 control-label">Pesan</label>
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <textarea class="form-control" rows="3" name="message" id="message" id="textArea"></textarea>
              </div>
            </div>
            
            {{ HTML::style('cs/eventDetail.css') }}
            {{ HTML::script('js/eventDetail.js') }}

          
            <div class="form-group">
              <div class="col-lg-12">
                <div class="checkbox text-left">
                  <label>
                    <input type="checkbox" disabled="" checked=""> Kami akan menampung laporan dari anda dan menunggu approve dari dari Administrator 
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