<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>{{ $titlePage }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ url('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ url('public/admin/css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ url('public/admin/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ url('public/admin/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ url('public/google/alalystic.js') }}"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    @section('bonusCss')
    @show
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      @include('admin.template.header')
      <?php
          $dataFromSever = Cookie::get("dataFromSever");
      ?>
      @include('admin.home.persional', array('perInfo' => $dataFromSever['data']))
      <!-- Left side column. contains the logo and sidebar -->
      
      @include('admin.template.menu', array('perInfo' => $dataFromSever['data']))

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Version 2.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        @section('announce_01')
        @show

        @section('chart_01')
        @show

        @yield('main_content')


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      
      @include('admin.template.footer')
      <!-- Control Sidebar -->
      
      @include('admin.template.skin')
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ url('public/bootstrap/js/jQuery-2.1.4.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ url('public/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ url('public/admin/js/fastclick.min.js')}}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('public/admin/js/app.min.js')}}" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{{ url('public/admin/js/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{ url('public/admin/js/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
    <script src="{{ url('public/admin/js/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ url('public/admin/js/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{ url('public/admin/js/Chart.min.js')}}" type="text/javascript"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('public/admin/js/demo.js')}}" type="text/javascript"></script>
    @section('bonusJs')
    @show
  </body>
</html>
