$(".thumbnail").click(function() {
    var elemen = $(this);
    $("#isiPhoto").empty();
    $('#modal_no_head').modal('show');
    var datahref = $(this).attr('href');
    var defaultPhoto = $(this).attr('data-foto');
    $("#isiPhoto").append('<img class="img-responsive" src="' + datahref + '" >');
	// set Photo Default Image
    $("#delImages").click(function(){        
        $.ajax({ 
            url: set_url+defaultPhoto, 
            method: "GET",
            success: function(msg){
                if(msg != 'fail'){
                     var $elem = $('#voley');
                    $("#setphoto").empty();
                    $("#setphoto").append(msg);
                    var position = $("#voley").position();
                    scroll(0,position.top);
                }
            }
        });
    })

    $("#delPhoto").click(function(){        
        $.ajax({ 
            url: del_url+defaultPhoto,
            method: "GET",
            success: function(msg){
                if(msg != 'fail'){
                    $(elemen).hide();
                }
            }
        });
    })
    return false;
});
