<!DOCTYPE html>

<html>
  <head>
    @include('admin.includes.head')
  </head>
  
  <body class="skin-blue">
    <div class="wrapper">

      <!-- Main Header -->
      @include('admin.includes.header')

      <!-- Left side column. contains the logo and sidebar -->
      @include('admin.includes.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Content Header (Page header) -->
        @include('admin.includes.content-header')

        <!-- Main content -->
        <section class="content">
          @yield('content')
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      @include('admin.includes.footer')

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    <!--
    {{ HTML::script('assets/assets/js/jquery-1.10.1.min.js'); }}
    <!-- Bootstrap 3.3.2 JS -->
    {{ HTML::script('assets/bootstrap/js/bootstrap.min.js'); }}
    <!-- AdminLTE App -->
    {{ HTML::script('assets/admin/js/app.min.js'); }}

    @yield('append-js')
    
  </body>
</html>