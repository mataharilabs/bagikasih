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
            
            @if (Session::has('user_connect'))
              @if (Session::get('user_connect.provider') == 'facebook')
                
                  <p class="text-center">
                  <img src="http://graph.facebook.com/{{ Session::get('user_connect.id') }}/picture"><br/>
                  Anda telah terhubung dengan akun Facebook Anda
                  </p>
                
              @elseif (Session::get('user_connect.provider') == 'twitter')
                
                  <p class="text-center">
                  <img src="{{ Session::get('user_connect.profile_image_url') }}"><br/>
                  Anda telah terhubung dengan akun Twitter Anda
                  </p>
                
              @endif
            @else
              
                <a href="{{ route('signin-with-twitter') }}?redirect={{ $currenturl }}" class="btn btn-block btn-social btn-twitter">
                <i class="fa fa-twitter"></i>
                Sign Up with Twitter
                </a>
              
                <a href="{{ route('signin-with-fb') }}?redirect={{ $currenturl }}" class="btn btn-block btn-social btn-facebook">
                  <i class="fa fa-facebook"></i>
                  Sign Up with Facebook
                </a>

            @endif

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