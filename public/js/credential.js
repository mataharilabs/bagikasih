function login(data){	
	$("#loginfailure").hide();
	$("#loginfailure").empty();
	var email    = data.email.value;
	var password = data.password.value;
	var senddata  = 'email='+email+'&password='+password;
	var failure = '';
	$.ajax({
		  url: "/signin",
		  method: "post",
		  data: senddata,
		  success:function(response){
		  	console.log(response);
		  	
		  	if(response === 'object'){
			  	for(var i=0;i<response.length;i++){
			  		failure += response[i] + '<br />';
			  	}
			  	$("#loginfailure").append(failure);
			  	$("#loginfailure").show();
		  	}

		  	if(response == 'no'){
		  		$("#loginfailure").append('Email or password is failed');
			  	$("#loginfailure").show();
		  	}
		  	return false;
		  }
	});
	return false;
}

function signup(){

}