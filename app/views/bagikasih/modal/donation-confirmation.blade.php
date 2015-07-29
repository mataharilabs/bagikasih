@if (Auth::check())

<!-- Modal Donation - Mulai -->
<div class="modal fade text-center" id="modal-donation-confirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">KONFIRMASI PENGIRIMAN DONASI</h4>
      </div>
    
      <div class="modal-body">

        <form class="form-horizontal" onSubmit="return donationConfirmation(this);">
          
          <fieldset>

            <div class="alert alert-danger" id="donation-confirmation-alert" role="alert" style="display:none;"></div>

            <div class="form-group">
              
              <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 text-center">
                <i class="fa fa-gift fa-5x"></i>
              </div>

              <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 text-left">
                <p>Halo, <b>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}!</b></p>
              </div>
            
            </div>

            <div class="form-group">
              <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                <select class="form-control" id="currency" name="currency">
                  <option value="IDR">Rupiah (IDR)</option>
                  <!-- <option value="USD">$ Dollar (USD)</option> -->
                </select>
              </div>         
              
              <div class="col-lg-8 col-md-9 col-sm-9 col-xs-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
                    <input class="form-control" type="fname" placeholder="100.000" id="total" name="total">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                <div class='input-group date' id='transferred_at'  >
                  <input type='text' class="form-control" name='transferred_at'  placeholder="Transfer pada tanggal (dd-mm-yyyy)" value="{{ date('d-m-Y') }}" />
                  <span class="input-group-addon">
                  <span class="fa fa-calendar fa-fw"></span>
                  </span>
                </div>
              </div>         
              
              <div class="col-lg-8 col-md-9 col-sm-9 col-xs-6">
                <div class="input-group">
                  <select class="form-control" id="to_bank" name="to_bank" placeholder="Ke Bank">
                    <option value="0">Ke Bank :</option>
                    <option>BCA 010-720-6888 a/n PT Matahari Labs</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                <input class="form-control" type="text" placeholder="Nama Bank Anda" name="bank_name" id="bank_name">
              </div>
            </div>

            <div class="form-group">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                <input class="form-control" type="text" placeholder="No.Rekening Anda" name="bank_account" id="bank_account">
              </div>
            </div>

            <div class="form-group">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                <input class="form-control" type="text" placeholder="Atas Nama" name="bank_account_name" id="bank_account_name">
              </div>
            </div>

            <div class="form-group">
              <div class="col-lg-12">
                <textarea class="form-control" rows="3" id="textArea" name="message" id="message" placeholder="Tulis sebuah pesan atau komentar disini"></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-lg-12">

                @if (isset($social_target->name))
                  <input type="hidden" name="type_name" id="type_name" value="social_targets">
                  <input type="hidden" name="type_id" id="type_id" value="{{ $social_target->id }}">
                @elseif (isset($social_action->name))
                  <input type="hidden" name="type_name" id="type_name" value="social_actions">
                  <input type="hidden" name="type_id" id="type_id" value="{{ $social_action->id }}">
                @endif

                <input type="hidden" name="donation_ids" id="donation_ids">
                <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa fa-gift"></i> Konfirmasikan</button>
              </div>
            </div>

          </fieldset>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Donation - Selesai -->

{{ HTML::script('js/donation.js'); }}

<script type="text/javascript">
$(function () {
  $('#transferred_at').datetimepicker({
    format: 'DD-MM-YYYY',
  });
});
</script>

@endif