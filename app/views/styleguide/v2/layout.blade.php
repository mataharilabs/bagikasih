<html lang="en" class="html-v2">
	<head>
		@yield('header')
	</head>
	<body id="home" class="bkv2">
		@section('navbar')@show
		

		@section('container')
		@show
		

			@yield('footer')
			
	    {{ HTML::script('assets/components/bootstrap/dist/js/bootstrap.min.js'); }}
	    {{ HTML::script('assets/components/bs-tour/js/bootstrap-tour-standalone.min.js'); }}
	    {{ HTML::script('assets/assets/js/bagikasih.js'); }}

	    <script type="text/javascript">
	    	$(document).ready(function() {
	    	 
	    	  var owl = $(".showbar-inner");
	    	 
	    	  owl.owlCarousel({
	    	      items : 4, //10 items above 1000px browser width
	    	      itemsDesktop : [1200,3], //5 items between 1000px and 901px
	    	      itemsDesktopSmall : [992,2], // betweem 900px and 601px
	    	      itemsTablet: [768,2], //2 items between 600 and 0
	    	      itemsMobile : [480,1] // itemsMobile disabled - inherit from itemsTablet option
	    	  });
	    	 
	    	  // Custom Navigation Events
	    	  $(".next").click(function(){
	    	    owl.trigger('owl.next');
	    	  })
	    	  $(".prev").click(function(){
	    	    owl.trigger('owl.prev');
	    	  })
	    	  $(".play").click(function(){
	    	    owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
	    	  })
	    	  $(".stop").click(function(){
	    	    owl.trigger('owl.stop');
	    	  })
	    	 
	    	});

	    	// bootstrap-tour
	    	var tour = new Tour({
	    	  steps: [
	    	  {
	    	    element: "#beri",
	    	    title: "Title of my step",
	    	    content: "Content of my step"
	    	  },
	    	  {
	    	    element: "#pelajari",
	    	    title: "Title of my step",
	    	    content: "Content of my step"
	    	  }
	    	]});

	    	// Initialize the tour
	    	tour.init();

	    	// Start the tour
	    	tour.start();

	    </script>
	</body>
</html>