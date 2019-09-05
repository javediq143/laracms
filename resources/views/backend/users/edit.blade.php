<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Boxed Layout</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- COMMON CSS FOR ALL PAGES -->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('backend/theme/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend/theme/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('backend/theme/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/theme/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('backend/theme/dist/css/skins/_all-skins.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- COMMON CSS FOR ALL PAGES -->

  <!-- CSS FOR CURRENT PAGE ONLY -->
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('backend/theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- CSS FOR CURRENT PAGE ONLY -->

</head>
<!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
<body class="hold-transition skin-blue layout-boxed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <form id="logout-form" action="{{ route('cms.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('backend/theme/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('backend/theme/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                <p>
                  {{ Auth::user()->name }} - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{ URL::route('cms.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('backend/theme/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active"><a href="https://adminlte.io/docs"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>User Access Control</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ URL::route('cms.user-management.index') }}"><i class="fa fa-circle-o"></i> User Management</a></li>
            <li><a href="{{--{{ URL::route('cms.priviledge.list') }}--}}"><i class="fa fa-circle-o"></i> User Priviledges</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Menu Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> Main Menu</a></li>
            <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Sub Menu</a></li>
          </ul>
        </li>        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Welcome {{ Auth::user()->name }}</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User Management</a></li>
        <li class="active">Edit User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">     
        <div class="box-body">
          <form role="form" name="frmEditUser" id="frmEditUser" method="POST" action="{{ route('cms.user-management.update', $arrRecord->id) }}" autocomplete="false">
            @csrf
            @method('PUT')
            
            <div class="row">          
              <div class="col-md-6">
                <div class="form-group @error('name') has-error @enderror">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $arrRecord->name }}">
                  @error('name')
                    <span class="help-block"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group @error('name') has-error @enderror">
                  <label for="usrmail">Email</label>
                  <input type="email" class="form-control" id="usrmail" name="usrmail" placeholder="Email" value="{{ $arrRecord->email }}">
                  @error('usrmail')
                    <span class="help-block"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>
            </div>
            <!-- /.box -->

            <div class="row">          
              <div class="col-md-6">
                <div class="form-group @error('usrname') has-error @enderror">
                  <label for="usrname">User name</label>
                  <input type="text" class="form-control" id="usrname" name="usrname" placeholder="User name"  value="{{ $arrRecord->username }}" disabled="">
                  @error('usrname')
                    <span class="help-block"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group @error('usrname') has-error @enderror">
                  <label for="usrpwd">Password</label>
                  <input type="text" class="form-control" id="usrpwd" name="usrpwd" placeholder="Set New Password">
                  @error('usrpwd')
                    <span class="help-block"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>
            </div>
            <!-- /.box -->

            <div class="row">          
              <div class="col-md-2">
                <div class="form-group">
                  <input type="submit" class="btn btn-block btn-primary" id="sbtSave" value="Submit">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <input type="button" class="btn btn-block btn-warning" id="btnReset" value="Reset">
                </div>
              </div>
            </div>
            <!-- /.box -->
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>
  
</div>
<!-- ./wrapper -->

<!-- COMMON JS FOR ALL PAGES -->
<!-- jQuery 3 -->
<script src="{{ asset('backend/theme/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('backend/theme/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('backend/theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('backend/theme/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/theme/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/theme/dist/js/demo.js') }}"></script>
<!-- COMMON JS FOR ALL PAGES -->

<!-- JS FOR CURRENT PAGE ONLY -->
<link href="{{ asset('backend/theme/css/jquery-ui.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('backend/theme/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/theme/js/jquery-ui.js') }}"></script>
<script>
    $(document).ready(
      function()
      {
        jQuery.validator.addMethod("lettersonly", function(value, element) {
          return this.optional(element) || /^[a-z ]+$/i.test(value);
        }, "Only alphabets are allowed in name");

        jQuery.validator.addMethod("alphNumSpcl", function(value, element) {
          return this.optional(element) || /^[a-zA-Z0-9._]+$/i.test(value);
        }, "Only Alphabets, Numbers, Dot and Underscore allowed in user name");
        
        jQuery.validator.addMethod("valid_email_type", function(value, element) {
            return this.optional(element) || /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/i.test(value);
        }, "Enter a valid email");

        jQuery.validator.addMethod("password", function(value, element) {
            return this.optional(element) || /[A-Z]+/.test(value) && /[a-z]+/.test(value) && /[\d\W]+/.test(value) && /\S{7,}/.test(value);
        }, "Invalid password format");	
      
        $('#btnReset').click(
          function()
          {
            $('#frmEditUser').trigger("reset");
          }
        );

        /*$('#sbtSave').click(
          function()
          {
            console.log('button clicked');
            var inputIsValid = $("#frmNewUser").valid();
            console.log('inputIsValid '+inputIsValid);
            if(inputIsValid)
            {
              console.log('submitting form');
              $("#frmNewUser").submit();
            }
          }
        );*/

        /*$("#frmNewUser").validate({
          rules: {
            name: {
            required: true,
            minlength: {{ Config::get('cms_const.USER_NAME_MIN_LEN') }},
            maxlength: {{ Config::get('cms_const.USER_NAME_MAX_LEN') }},
            lettersonly: true
            },
            usrmail: {
            required: true,
            valid_email_type: true,
            email: true,
            maxlength: {{ Config::get('cms_const.USER_EMAIL_MAX_LEN') }}					
            },
            usrname: {
            required: true,
            minlength: {{ Config::get('cms_const.USER_ID_MIN_LEN') }},
            maxlength: {{ Config::get('cms_const.USER_ID_MAX_LEN') }},
            alphNumSpcl: true				
            },
            usrpwd: {
            required: true,
            minlength: {{ Config::get('cms_const.USER_PWD_MIN_LEN') }},
            maxlength: {{ Config::get('cms_const.USER_PWD_MAX_LEN') }},
            password: true
            }
          },
          messages: {				
            name: {
            required: "Please enter name",
            minlength: "Name should not be less then {{ Config::get('cms_const.USER_NAME_MIN_LEN') }} characters",
            maxlength: "Name should not be more then {{ Config::get('cms_const.USER_NAME_MAX_LEN') }} characters"
            },
            usrmail: {
            required: "Please enter email",
            maxlength: "Name should not be more then {{ Config::get('cms_const.USER_NAME_MAX_LEN') }} characters",
            maxlength: "Email should not be more then {{ Config::get('cms_const.USER_EMAIL_MAX_LEN') }} characters"					
            },
            usrname: {
            required: "Please enter the user name",		
            minlength: "User name should not be less then {{ Config::get('cms_const.USER_ID_MIN_LEN') }} characters",
            maxlength: "User name should not be more then {{ Config::get('cms_const.USER_ID_MAX_LEN') }} characters"			
            },
            usrpwd: {
            required: "Please enter the password",		
            minlength: "Password should not be less then {{ Config::get('cms_const.USER_PWD_MIN_LEN') }} characters",
            maxlength: "Password should not be more then {{ Config::get('cms_const.USER_PWD_MAX_LEN') }} characters"			
            }
          },
          submitHandler: function(form) {	
            alert('submitting form');
            $(form).submit();
          }
        });*/
      }
    );
</script>
<!-- JS FOR CURRENT PAGE ONLY -->

</body>
</html>
