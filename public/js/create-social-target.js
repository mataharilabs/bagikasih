function post_create_social_target(senddata,user_id){
	var failure = '';
	$.ajax({
		url: "/daftarkan-target-sosial",
		method: "post",
		data: senddata,
		success:function(response){
			if (typeof response == 'string')
			{
				response = JSON.parse(response);	
			}

			if (response.success == false)
			{
				for(var i=0; i<response.errors.length;i++)
				{
					failure += response.errors[i] + '<br />';
				}

				$("#success").hide();
				$("#loginfailure").html(failure);
				$("#loginfailure").show();
				window.scrollTo(0,0);
			} else {
				$("#loginfailure").hide();
				$("#success").html('Proses pendaftaran berhasil. Data Anda telah masuk ke dalam database kami. Selanjutnya admin dari BagiKasih akan melakukan verifikasi data Anda. Terima kasih.');
				$("#success").show();
				// window.scrollTo(0, 0);
				window.location.replace(response.redirect_url);
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
	
	post_create_social_target($(data).serialize(),user_id);

	return false;
}

