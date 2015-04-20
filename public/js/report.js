function createReport(data){
	$("#loginfailures").empty();
	var message = data.message.value;
	var subject_code = data.subject_code.value;
	var input = 'type_id='+type_id+'&type_name='+type_name+'&message='+message+'&subject_code='+subject_code;
	var failure = '';
	$.ajax({
		  url: "/report",
		  method: "post",
		  data: input,
		  success:function(response){
		  	if(typeof response === 'object'){
			  	for(var i=0;i<response.length;i++){
			  		failure += response[i] + '<br />';
			  	}
			  	$("#loginfailures").append(failure);
			  	$("#loginfailures").show();
		  	}else{
				document.location.href = currenturl;
		  	}
		  }
	});
	return false;
}