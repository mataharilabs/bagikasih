<div class="modal fade text-center  bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Log In</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" onSubmit="return login(this);">
          <fieldset>
            <!-- <a class="btn btn-block btn-social btn-twitter">
              <i class="fa fa-twitter"></i>
              Sign in with Twitter
            </a>
            <a class="btn btn-block btn-social btn-facebook">
              <i class="fa fa-facebook"></i>
              Sign in with Facebook
            </a> -->
            <div class="alert alert-danger" id="loginfailure" role="alert" style="display:none;">

            </div>

            <hr>Log in dengan akun terdaftar<p>
            <div class="form-group">
              <div class="col-lg-12">
                <div class="input-group margin-bottom-sm">
                  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                  <input class="form-control" type="text" id="email" name="email" placeholder="Email address">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                  <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-6">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Ingat saya
                  </label>
                </div>
              </div>
              <div class="col-lg-6">
                <button type="submit" class="btn btn-primary" style="width:100%;"><i class="fa fa-sign-in"></i> Log In</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        Tidak punya akun? <a href="#myModal2" data-toggle="modal" data-dismiss="modal">Daftar</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal Log In - Selesai -->
<!-- Modal Sign Up - Mulai -->
<div class="modal fade text-center  " id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Daftar</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" onSubmit="return signup(this);">
          <fieldset>
            <!-- <div class="form-group">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding-bottom:5px;">
                <a class="btn btn-block btn-social btn-twitter">
                  <i class="fa fa-twitter"></i>
                  Sign Up with Twitter
                </a>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a class="btn btn-block btn-social btn-facebook">
                  <i class="fa fa-facebook"></i>
                  Sign Up with Facebook
                </a>
              </div>
            </div> -->
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
        Sudah mempunyai akun? <a href="#myModal" data-toggle="modal" data-dismiss="modal">Log In</a>
      </div>
    </div>
  </div>
</div>
