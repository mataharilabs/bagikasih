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
				$("html, body").animate({scrollTop:0},"slow");              
				return false;
			} else if(response == 'no'){
				$("#sukses").hide();
				$("#loginfailure").html('Proses pendaftaran event gagal dilakukan');
				$("#loginfailure").show();
			} else {
				$("#loginfailure").hide();
				$("#sukses").html('Proses pendaftaran event berhasil dilakukan');
				$("#sukses").show();
				$("html,body").animate({scrollTop:0});
				document.getElementById("createEvent_form").reset();
				setTimeout(function(){
					window.location.href = '/event';
				},4000);
			}
		}
	});
}

function create_event(data){
	data = $(data).serializeArray();
	for (var item in data){
		if(data[item].name == 'start_date'){
			data.push({name:'started_at',value:data[item].value});
			delete data[item];
		}
		else if(data[item].name == 'end_date'){
			data.push({name:'ended_at',value:data[item].value});
			delete data[item];
		}
	}
	data = jQuery.param(data);

	$("#loginfailure").empty();
	$("#success").empty();

	post_create_event(data,user_id);

	return false;
}