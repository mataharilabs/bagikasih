$(".thumbnail").click(function() {
    $("#isiPhoto").empty();
    $('#modal_no_head').modal('show');
    var datahref = $(this).attr('href');
    var defaultPhoto = $(this).attr('data-foto');
    $("#isiPhoto").append('<img class="img-responsive" src="' + datahref + '" >');
	// set Photo Default Image
	$("#delImage").click(function(){		
		$.ajax({ 
        	url: base_url+defaultPhoto, 
        	method: "GET",
        	success: function(msg){
        		if(msg != 'fail'){
        			 var $elem = $('.box-header');
        			$("#setphoto").empty();
        			$("#setphoto").append(msg);
        			$('html, body').animate({scrollTop: $elem.height()}, 800);
        		}
        	}
        });
	})
    return false;
});
