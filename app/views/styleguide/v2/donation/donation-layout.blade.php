<html lang="en" class="html-v2">
	<head>
		@yield('header')
	</head>
	<body class="bkv2">
		@section('navbar')@show
		

		@section('container')

		@show
		

		@yield('footer')
		
    {{ HTML::script('assets/components/bootstrap/dist/js/bootstrap.min.js'); }}
    {{ HTML::script('assets/components/bs-tour/js/bootstrap-tour-standalone.min.js'); }}
    {{ HTML::script('assets/assets/js/bagikasih.js'); }}

    <script type="text/javascript">
    	$(document).ready(function() {
    	 
    	 
    	 
    	});

    </script>

	</body>
</html>