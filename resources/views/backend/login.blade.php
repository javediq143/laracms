<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('backend/theme/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend/theme/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('backend/theme/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/theme/dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('backend/theme/plugins/iCheck/square/blue.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="POST" action="{{ route('cms.login.do') }}" autocomplete="false" id="frmLogin">
      @csrf

      <div class="form-group @error('usrname') has-error @enderror">
        <label for="usrname" class="control-label">{{ __('User Name') }}</label>
        <input id="usrname" type="text" class="form-control" name="usrname" value="{{ old('usrname') }}" placeholder="User Name" />
        @error('usrname')
          <span class="help-block"><strong>{{ $message }}</strong></span>
        @enderror	
      </div>

      <div class="form-group @error('password') has-error @enderror">
        <label for="password" class="control-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control" name="password" placeholder="Password" />
        @error('password')
          <span class="help-block"><strong>{{ $message }}</strong></span>
        @enderror
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="#">I forgot my password</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('backend/theme/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('backend/theme/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('backend/theme/plugins/iCheck/icheck.min.js') }}"></script>

<!--FORM VALIDATION-->
<link href="{{ asset('backend/theme/css/jquery-ui.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('backend/theme/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/theme/js/jquery-ui.js') }}"></script>
<script>        	
	$(document).ready(function(){	

      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
		
			$("#frmLogin").validate({
				rules: {
					usrname: {
					required: true
					},
					password: {
					 required: true					
					}
				},
				messages: {				
					usrname: {
					required: "Please enter your user name"
					},
					password: {
					required: "Please select your password",					
					}
				},
				submitHandler: function(form) {	
          $(form).submit();
        }
			});
        
  });
  </script>
<!--FORM VALIDATION-->

</body>
</html>
