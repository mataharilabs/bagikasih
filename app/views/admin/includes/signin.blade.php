
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Bagikasih</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    {{ HTML::style('assets/admin/bootstrap/css/bootstrap.min.css'); }}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    {{ HTML::style('assets/admin/css/AdminLTE.min.css'); }}
    {{ HTML::style('assets/admin/plugins/iCheck/square/blue.css'); }}
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Bagikasih</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in</p>
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif
        {{  Form::open(array('route' => 'signin.post', 'method' => 'post')) }}
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="email" placeholder="Email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <!-- jQuery 2.1.3 -->
    {{ HTML::script('assets/admin/plugins/jQuery/jQuery-2.1.3.min.js'); }}
    {{ HTML::script('assets/admin/bootstrap/js/bootstrap.min.js'); }}
    {{ HTML::script('assets/admin/plugins/iCheck/icheck.min.js'); }}
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>