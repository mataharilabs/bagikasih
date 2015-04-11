function post_create_event(senddata,user_id){
	var failure = '';
	$.ajax({
			  url: "/post-event",
			  method: "post",
			  data: senddata,
			  success:function(response){
			  	if(typeof response === 'object'){
				  	for(var i=0;i<response.length;i++){
				  		failure += response[i] + '<br />';
				  	}
					$("#success").hide();
				  	$("#loginfailure").append(failure);
				  	$("#loginfailure").show();
			  	}else if(response == 'no'){
					$("#success").hide();
			  		$("#loginfailure").append('The process of registering event is failed');
				  	$("#loginfailure").show();
			  	}else{
			  		if(user_id == ''){
						$("#loginfailure").hide();
						$("#success").hide();
						$("#loginfailure").hide();
			  			$("#success").append('The process of registering event is successfull');
						$('#modal-signin').modal('show');
					}else{
						$("#loginfailure").hide();
			  			$("#success").append('The process of registering event is successfull');
				  		$("#success").show();
			  		}
			   }
			 }
	});
}

function create_event(data){

	var event_category_id = data.event_category_id.value;
	var city_id = data.city_id.value;
	var name = data.name.value;
	var description = data.description.value;
	var user_id = data.user_id.value;
	var stewardship = data.stewardship.value;
	var location = data.location.value;
	var email = data.email.value;
	var website_url = data.website_url.value;
	var social_media_urls = data.social_media_urls.value;
	var start_date = data.start_date.value;
	var end_date = data.end_date.value;

	$("#loginfailure").empty();
	$("#success").empty();

	var senddata  = 'event_category_id='+event_category_id+'&city_id='+city_id+'&name='+name+'&description='+description+'&user_id='+user_id+'&stewardship='+stewardship+'&location='+location+'&email='+email+'&website_url='+website_url+'&started_at='+start_date+'&ended_at='+end_date+'&social_media_urls='+social_media_urls;
	post_create_event(senddata,user_id);

	return false;
}

