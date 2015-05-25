<html lang="en">
	<head>
		@yield('header')
	</head>
	<body id="home" class="bkv2">
		@section('navbar')

		@show
		
		@section('sidebar')

		@show
		
		<div class="container">
			@yield('footer')
	    </div>
	    {{ HTML::script('assets/components/bootstrap/dist/js/bootstrap.min.js'); }}
	    {{ HTML::script('assets/assets/js/bagikasih.js'); }}
	</body>
</html>