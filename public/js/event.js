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
	var start_date = data.start_date.value;
	var end_date = data.end_date.value;


	if(user_id == ''){
		$("#createEvent").fadeOut(1000,function(){
			$("#signin").fadeIn(100);
			return false;
		});
	}else{
			var senddata  = 'event_category_id='+event_category_id+'&city_id='+city_id+'&name='+name+'&description='+description+'&user_id='+user_id+'&stewardship='+stewardship+'&location='+location+'&email='+email+'&website_url='+website_url;
			// &start_date='+start_date+'&end_date='+end_date;
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
				  	$("#loginfailure").append(failure);
				  	$("#loginfailure").show();
			  	}else if(response == 'no'){
			  		$("#loginfailure").append('Email or password is failed');
				  	$("#loginfailure").show();
			  	}else{
			  		$("#email").val('');
			  		$("#password").val('');
			  		// document.location.href = currenturl;
			  	}
			  	return false;
			  }
		});
	}
	return false;
}

