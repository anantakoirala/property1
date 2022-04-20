<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('backend/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.4/datepicker.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/AdminLTE.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/datepicker/datepicker3.css')}}">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/skins/_all-skins.min.css')}}">
 
  

  <style type="text/css">
    .modal-dialog{
        position: relative;
        display: table; //This is important
        overflow-y: auto;
        overflow-x: auto;
        min-width: 300px;
    }

    .jcrop-keymgr{
      opacity:0 !important;
    }
    button{
          background: none;
            border:none;
            padding:0;
            margin:0;
        }


  
  </style>
  @stack('styles')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sheetal Property</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">Sheetal Property</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  Sheetal Property
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('front/images/hotel-ananda-white-logo.png')}}"  alt="User Image" style="max-width: 120px;" >
        </div>
       
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="{{route('dashboard.index')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
           <!--  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
          
          
          
          <li class="treeview ">
            <a href="#">
             <i class="fa fa-gift"></i> <span>Property</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              
              
              <li class=""><a href="{{route('property.index')}}"><i class="fa fa-circle-o text-yellow"></i> All Properties</a></li>
              <li class=""><a href="{{route('property-type.index')}}"><i class="fa fa-circle-o text-yellow"></i> All Property Types</a></li>
              <li class=""><a href="{{route('class-type.index')}}"><i class="fa fa-circle-o text-yellow"></i> All Class Types</a></li>
              <li class=""><a href="{{route('property-title.index')}}"><i class="fa fa-circle-o text-yellow"></i> All Property Titles</a></li>
              <li class=""><a href="{{route('property-status.index')}}"><i class="fa fa-circle-o text-yellow"></i> All Property Statuses</a></li>
              
            </ul>
          </li>
          
          <li class="treeview ">
            <a href="#">
             <i class="fa fa-gift"></i> <span>Other Extensions</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              
              
              <li class=""><a href="{{route('ad-objective.index')}}"><i class="fa fa-circle-o text-yellow"></i> All Advertisement Objectives</a></li>
              <li class=""><a href="{{route('ad-type.index')}}"><i class="fa fa-circle-o text-yellow"></i> All Advertisement Type</a></li>
              <li class=""><a href="{{route('transaction-type.index')}}"><i class="fa fa-circle-o text-yellow"></i> All Transaction Type</a></li>
              <li class=""><a href="{{route('urgency-type.index')}}"><i class="fa fa-circle-o text-yellow"></i> All Urgency Type</a></li>
              <li class=""><a href="{{route('environment.index')}}"><i class="fa fa-circle-o text-yellow"></i> All Environments</a></li>
              <li class=""><a href="{{route('completion.index')}}"><i class="fa fa-circle-o text-yellow"></i> All Completions</a></li>
              <li class=""><a href="{{route('elevation.index')}}"><i class="fa fa-circle-o text-yellow"></i> All Elevation</a></li>
              <li class=""><a href="{{route('facility.index')}}"><i class="fa fa-circle-o text-yellow"></i> All Facilities</a></li>
              <li class=""><a href="{{route('nearby-facility.index')}}"><i class="fa fa-circle-o text-yellow"></i> All Near By Facilities</a></li>
              
            </ul>
          </li>
          
          
          
          
          
          
          
          
          
          
          <li class="treeview ">
            <a href="#">
             <i class="fa fa-gift"></i> <span>Seller</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=""><a href="{{route('commission-type.index')}}"><i class="fa fa-circle-o text-yellow"></i> All Commission Type</a></li>
              
            </ul>
          </li>
          <li class="treeview ">
            <a href="#">
             <i class="fa fa-gift"></i> <span>Construction</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=""><a href="{{route('owner-type.index')}}"><i class="fa fa-circle-o text-yellow"></i> Owner Type</a></li>
              
            </ul>
          </li>
          
        
         
        
        
        
          <!--Menu Placeholder-->
        
        
        
        
       
       
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
   @yield('content')

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    
    
  </footer>

  <!-- Control Sidebar -->
  <!--  -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('backend/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('backend/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('backend/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('backend/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->

<script src="{{asset('backend/dist/js/demo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stack('script')
</body>
</html>
