<meta charset="UTF-8">
<title>Admin Panel - BagiKasih | {{ $title }}</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- Bootstrap 3.3.2 -->
{{ HTML::style('assets/bagikasih/bootstrap.css'); }}
<!-- Font Awesome Icons -->
{{ HTML::style('assets/admin/font-awesome-4.1.0/css/font-awesome.min.css'); }}

<!-- Ionicons -->
<link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
{{ HTML::style('assets/admin/css/AdminLTE.min.css'); }}
{{ HTML::style('assets/admin/css/skins/skin-blue.min.css'); }}

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

@yield('append-css')