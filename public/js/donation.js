function donation(data){	
	
	$("#donation-alert").hide();
	$("#donation-alert").empty();
	
	var currency = data.currency.value;
	var total = data.total.value;
	var message = data.message.value;
	var as_noname = 0;
	if (data.as_noname.checked) as_noname = 1;
	var type_name = data.type_name.value;
	var type_id = data.type_id.value;
	var senddata  = 'currency='+currency+'&total='+total+'&message='+message+'&as_noname='+as_noname+'&type_name='+type_name+'&type_id='+type_id;
	var failure = '';
	// var currenturl = document.URL;
	$.ajax({
		url: "/donation",
		method: "post",
		data: senddata,
		success: function(response)
		{
			if (typeof response == 'string')
			{
				response = JSON.parse(response);	
			}

			if (response.success == false)
			{
				for(var i=0; i<response.errors.length;i++){
			  		failure += response.errors[i] + '<br />';
			  	}

			  	$("#donation-alert").append(failure);
			  	$("#donation-alert").show();
		  	}
		  	else
		  	{
				window.location.replace(response.redirect_url);
		  	}

		  	return false;
		}
	});
	return false;
}