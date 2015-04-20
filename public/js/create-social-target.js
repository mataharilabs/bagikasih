function post_create_social_target(senddata,user_id){
	var failure = '';
	$.ajax({
			  url: "/daftarkan-target-sosial",
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
			  		$("#loginfailure").append('Proses gagal');
				  	$("#loginfailure").show();
			  	}else{
			  		if(user_id == ''){
						$("#loginfailure").hide();
						$("#success").hide();
						$("#loginfailure").hide();
			  			$("#success").append('Proses pendaftaran berhasil');
						$('#modal-signin').modal('show');
					}else{
						$("#loginfailure").hide();
			  			$("#success").append('Proses pendaftaran gagal');
				  		$("#success").show();
			  		}
			   }
			 }
	});
}

function create_social_target(data){

	var social_target_category_id = data.social_target_category_id.value;
	var city_id = data.city_id.value;
	var name = data.name.value;
	var description = data.description.value;
	var user_id = data.user_id.value;
	var stewardship = data.stewardship.value;
	var address = data.address.value;
	var email = data.email.value;
	var phone_number = data.phone_number.value;
	var social_media_urls = data.social_media_urls.value;

	$("#loginfailure").empty();
	$("#success").empty();

	var senddata  = 'social_target_category_id='+social_target_category_id+'&city_id='+city_id+'&name='+name+'&description='+description+'&user_id='+user_id+'&stewardship='+stewardship+'&address='+address+'&email='+email+'&phone_number='+phone_number+'&social_media_urls='+social_media_urls;
	post_create_social_target(senddata,user_id);

	return false;
}

