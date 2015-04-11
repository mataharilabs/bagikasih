<form class="form-horizontal" onSubmit="return signin(this,'');">
<div class="modal-body">
  <fieldset>
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
</div>
<div class="modal-footer">
  Tidak punya akun? <a href="#modal-signup" data-toggle="modal" data-dismiss="modal">Daftar</a>
</div>
</form>