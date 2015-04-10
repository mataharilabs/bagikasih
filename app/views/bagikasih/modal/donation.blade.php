@if (Auth::check())

<!-- Modal Donation - Mulai -->
<div class="modal fade text-center" id="modal-donation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">MEMBERI DONASI</h4>
      </div>
    
      <div class="modal-body">

        <form class="form-horizontal" onSubmit="return donation(this);">
          
          <fieldset>

            <div class="alert alert-danger" id="donation-alert" role="alert" style="display:none;"></div>

            <div class="form-group">
              
              <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 text-center">
                <i class="fa fa-gift fa-5x"></i>
              </div>

              <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12 text-left">
                <p>Hello, <b>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}!</b></p>
                <p>Anda akan donasi untuk:<br><b>{{ isset($social_target->name) ? $social_target->name : $social_action->name }}</b></p>
              </div>
            
            </div>

            <hr>Tentukan besar donasi anda kepada {{ isset($social_target->name) ? $social_target->name : $social_action->name }}<p>

            <div class="form-group">
              
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
                <select name='currency' id="currency" class="form-control">
                  <option value="IDR">Rupiah (IDR)</option>
                  <option value="USD">$ Dollar (USD)</option>
                </select>
              </div>         
              
              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-7">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
                    <input class="form-control" type="text" placeholder="100000" name="total" id="total">
                </div>
              </div>

            </div>

            <div class="form-group">
              
              <div class="col-lg-12">
                <textarea class="form-control" rows="3" id="textArea" name="message" id="message" placeholder="Tulis sebuah pesan atau komentar di sini"></textarea>
              </div>
            
            </div>

            <div class="form-group">
              
              <div class="col-lg-12">
                <div class="checkbox text-left">
                  <label>
                    <input type="checkbox" name="as_noname" id="as_noname" value="1"> Saya ingin donasi saya tidak mencantumkan nama
                  </label>
                </div>
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

                <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa fa-gift"></i> Donasikan</button>
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

@endif