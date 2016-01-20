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
					$("#sukses").hide();
				  	$("#loginfailure").append(failure);
				  	$("#loginfailure").show();
					$("html, body").animate({ scrollTop: 0 }, "slow");              
					return false;
			  	}else if(response == 'no'){
					$("#sukses").hide();
			  		$("#loginfailure").append('Proses pendaftaran event gagal dilakukan');
				  	$("#loginfailure").show();
			  	}else{
			  		if(user_id == ''){
						$("#loginfailure").hide();
						$("#sukses").hide();
						$("#loginfailure").hide();
			  			$("#sukses").append('Proses pendaftaran event berhasil dilakukan');
						$('#modal-signin').modal('show');
					}else{
						$("#loginfailure").hide();
			  			$("#sukses").append('Proses pendaftaran event berhasil dilakukan');
				  		$("#sukses").show();
						$("html,body").animate({scrollTop:0});
						document.getElementById("createEvent_form").reset();
						setTimeout(function(){
							window.location.href = '/event';
						},4000);
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

	post_create_event({
		event_category_id:event_category_id,
		city_id:city_id,
		name:name,
		description:description,
		user_id:user_id,
		stewardship:stewardship,
		location:location,
		email:email,
		website_url:website_url,
		started_at:start_date,
		ended_at:end_date,
		social_media_urls:social_media_urls
	},user_id);

	return false;
}

