<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Boxed Layout</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

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

  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
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
        <li class="active">Users Listing</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" id="content">
      @if ($message = Session::get('success'))
        <div class="row">
          <div class="col-xs-12">
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
          </div>
        </div>
      @endif

      @if($errors->any())
        <div class="row">
          <div class="col-xs-12">
            <div class="alert alert-error">
              <p>{{ $errors->first() }}</p>
            </div>
          </div>
        </div>
      @endif      

      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users Listing</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
              <table id="usr_tbl" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Last Login At</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($cms_users as $user)
                <tr data-uid="{{ $user->id }}">
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->last_login_at }}</td>
                  <td>
                    <span>
                      @if (is_null($user->deleted_at))
                        Active
                      @else
                        Suspended
                      @endif
                    </span>
                  </td>
                  <td>
                    <a href="{{ route('cms.user-management.edit',$user->id) }}" class="glyphicon glyphicon-edit" title="Edit" alt="Edit"></a>
                    |
                    @if (is_null($user->deleted_at))
                      <a href="#" class="glyphicon glyphicon-remove anchAction" data-action="suspend" title="Suspend" alt="Suspend" data-toggle="modal" data-target="#modal-danger"></a>
                    @else      
                      <a href="#" class="glyphicon glyphicon-ok anchAction" data-action="activate" title="Activate" alt="Activate" data-toggle="modal" data-target="#modal-info"></a>   
                    @endif       
                  </td>
                </tr>
                @endforeach             
                </tbody>

                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Last Login At</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>        
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->

        </div>
      </div>   

      <div class="modal modal-danger fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <form id="frmDelRecord" name="frmDelRecord">
                <input name="delRecId" id="delRecId" type="hidden" value="">
                <div class="modal-header">
                  <h4 class="modal-title">Caution!</h4>
                </div>
                <div class="modal-body">
                  <p>Do you want to delete this record?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left btnDelClose" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-outline btnAction" id="btnDelete">Delete</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>

      <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <form id="frmActvRecord" name="frmActvRecord">
                <input name="actvRecId" id="actvRecId" type="hidden" value="">
                <div class="modal-header">
                  <h4 class="modal-title">Caution!</h4>
                </div>
                <div class="modal-body">
                  <p>Do you want to activate this record?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left btnDelClose" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-outline btnAction" id="btnActivate">Activate</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

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
<!-- DataTables -->
<script src="{{ asset('backend/theme/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  var action = fldId = btnSubmit = btnClose = rid = '';

  $(function () {
    $('#usr_tbl').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

    btnDiv = $('#usr_tbl_wrapper').children('.row:first').children('.col-sm-6:first');
    $(btnDiv).append('<a href="{{ URL::route('cms.user-management.create')}}" class="btn btn-block btn-info">Create User</a>');

    $('.anchAction').click(
      function(evt)
      {
        evt.preventDefault();
        var rid = $(this).closest('tr').data('uid');
        action = $(this).data('action');
        if(action == 'suspend')
        {
          $('#delRecId').val(rid);
        }
        else
        {
          $('#actvRecId').val(rid);
        }
      }
    );

    $("#modal-danger, #modal-info").on("hidden.bs.modal", function () {
      $('#delRecId').val('');
      $('#actvRecId').val('');
    });

    $('.btnAction').click(
      function()
      {
        var modl = '';
        if(action == 'suspend')
        {
          modl = $('#modal-danger');
        }
        else
        {
          modl = $('#modal-info');
        }

        changeStatus(modl, action);
      }
    );

    

    /*$('#btnDelete').click(
      function()
      {
        $(this).attr("disabled", true);
        $('#btnDelClose').attr('disabled', true);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var rid = $('#delRecId').val();
        var resp = '';

        $.ajax({
            type: "DELETE",
            url: "{{ route('cms.user-management.store') }}"+'/'+rid,
            success: function (data) {
                if(data.hasOwnProperty('success'))
                {
                  resp = '<div class="row" id="delMsg"><div class="col-xs-12"><div class="alert alert-success"><p>'+data.success+'</p></div></div></div>';

                  $('#usr_tbl').find('tr[data-uid="'+rid+'"]').find('span').html('').html(data.status);
                }
                else
                {
                  resp = '<div class="row" id="delMsg"><div class="col-xs-12"><div class="alert alert-error"><p>'+data.error+'</p></div></div></div>';
                }                

                $('#modal-danger').modal('hide');
                $('#btnDelete').attr("disabled", false);
                $('#btnDelClose').attr('disabled', false);

                $(resp).prependTo('#content').hide().slideDown();
                setTimeout(function(){
                  $('#delMsg').slideUp('fast', function(){$(this).remove();});
                }, 3000);
            }
        });

        
        
      }
    );*/

  })    

    function changeStatus(modal, action)
    {
      fldId = $(modal).find('input:hidden');
      btnSubmit = $(modal).find("input.btnAction[type='button']");
      btnClose = $(modal).find("input.btnDelClose[type='button']");

      $(btnSubmit).attr("disabled", true);
      $(btnClose).attr('disabled', true);

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      rid = $(fldId).val(); 
      var objAjx = {};
      if(action == 'suspend')
      {
        objAjx.type = "DELETE";
        objAjx.url = "{{ route('cms.user-management.store') }}"+'/'+rid;
      }
      else
      {
        objAjx.type = "POST";
        objAjx.dataType = "json";
        objAjx.data = $(modal).find('form').serialize();
        objAjx.url = "{{ route('cms.user-management.store') }}";
      }
      objAjx.success = myresp;
      console.log(objAjx);

      $.ajax(objAjx);      
    }

    var myresp = function(data, textStatus, xhr)
    {
      var resp = '';
      if(data.hasOwnProperty('success'))
      {
        resp = '<div class="row" id="delMsg"><div class="col-xs-12"><div class="alert alert-success"><p>'+data.success+'</p></div></div></div>';

        $('#usr_tbl').find('tr[data-uid="'+rid+'"]').find('span').html('').html(data.status);
      }
      else
      {
        resp = '<div class="row" id="delMsg"><div class="col-xs-12"><div class="alert alert-error"><p>'+data.error+'</p></div></div></div>';
      }                

      $(modal).modal('hide');
      $(btnSubmit).attr("disabled", false);
      $(btnClose).attr('disabled', false);

      $(resp).prependTo('#content').hide().slideDown();
      setTimeout(function(){
        $('#delMsg').slideUp('fast', function(){$(this).remove();});
      }, 3000);
    }
</script>
<!-- JS FOR CURRENT PAGE ONLY -->

</body>
</html>
