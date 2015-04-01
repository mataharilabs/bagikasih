function login(data){	
	$("#loginfailure").hide();
	$("#loginfailure").empty();
	var email    = data.email.value;
	var password = data.password.value;
	var senddata  = 'email='+email+'&password='+password;
	var failure = '';
	var currenturl = document.URL;
	$.ajax({
		  url: "/signin",
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
		  		document.location.href = currenturl;
		  	}
		  	return false;
		  }
	});
	return false;
}

function signup(data){
	var email        	  = data.email.value;
	var firstname    	  = data.firstname.value;
	var lastname     	  = data.lastname.value;
	var phone_number 	  = data.phone_number.value;
	var password     	  = data.password.value;
	var password_confirm  = data.password_confirm.value;

	var senddata     = 'email='+email+'&password='+password+'&firstname='+firstname+'&lastname='+lastname+'&phone_number='+phone_number+'&password_confirm='+password_confirm;
	var failure = '';
	$.ajax({
		  url: "/signup",
		  method: "post",
		  data: senddata,
		  success:function(response){
		  	console.log(response);
		  	return false;
		  }
	});
	return false;	
}