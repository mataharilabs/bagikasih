<div class="modal fade text-center  bs-example-modal-sm" id="modal-signin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Log In</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" onSubmit="return login(this,'');">
          <fieldset>
            <!-- <a class="btn btn-block btn-social btn-twitter">
              <i class="fa fa-twitter"></i>
              Sign in with Twitter
            </a>
             -->
            <a class="btn btn-block btn-social btn-facebook" href="{{ route('signin-with-fb') }}">
              <i class="fa fa-facebook"></i>
              Sign in with Facebook
            </a>
            <div class="alert alert-danger" id="loginfailuresss" role="alert" style="display:none;">

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
        Tidak punya akun? <a href="#modal-signup" data-toggle="modal" data-dismiss="modal">Daftar</a>
      </div>
    </div>
  </div>
</div>