<div class="modal fade text-center" id="modal-signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Daftar</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" onSubmit="return signup(this,'');">
          <fieldset>
            
            @if (Session::has('user_connect'))
              @if (Session::get('user_connect.provider') == 'facebook')
                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                  <p class="text-center">
                  <img src="http://graph.facebook.com/{{ Session::get('user_connect.id') }}/picture"><br/>
                  Anda telah terhubung dengan akun Facebook Anda
                  </p>
                </div>
              @elseif (Session::get('user_connect.provider') == 'twitter')
                <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                  <p class="text-center">
                  <img src="{{ Session::get('user_connect.profile_image_url') }}"><br/>
                  Anda telah terhubung dengan akun Twitter Anda
                  </p>
                </div>
              @endif
            @else
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:5px;">
                <a href="{{ route('signin-with-twitter') }}?redirect={{ $currenturl }}" class="btn btn-block btn-social btn-twitter">
                <i class="fa fa-twitter"></i>
                Sign Up with Twitter
                </a>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="{{ route('signin-with-fb') }}?redirect={{ $currenturl }}" class="btn btn-block btn-social btn-facebook">
                  <i class="fa fa-facebook"></i>
                  Sign Up with Facebook
                </a>
              </div>
            @endif

            <div class="alert alert-danger" id="signupfailure" role="alert" style="display:none;">

            </div>
            <hr>Daftar akun baru<p>
            
            <div class="form-group">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  style="padding-bottom:5px;">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
                  <input class="form-control" id="firstname" name="firstname" type="text" placeholder="Nama Depan">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-edit fa-fw"></i></span>
                  <input class="form-control" id="lastname" name="lastname" type="text" placeholder="Nama Belakang">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  style="padding-bottom:5px;">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                  <input class="form-control" id="email" name="email" type="text" placeholder="Alamat Email">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                  <input class="form-control" id="phone_number" name="phone_number" type="text" placeholder="No. Telepon">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  style="padding-bottom:5px;">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                  <input class="form-control" id="password" name="password" type="password" placeholder="Password">
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                  <input class="form-control" id="password_confirm" name="password_confirm" type="password" placeholder="Ulangi Password">
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
        Sudah mempunyai akun? <a href="#modal-signin" data-toggle="modal" data-dismiss="modal">Log In</a>
      </div>
    </div>
  </div>
</div>