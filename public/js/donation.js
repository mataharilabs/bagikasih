function donation(data){	
	
	$("#donation-alert").hide();
	$("#donation-alert").empty();
	
	var as_noname = 0,
		failure = '';
		if(data.as_noname.checked) as_noname = 1;

	$.ajax({
		url: "/donation",
		method: "post",
		data: {
			currency:data.currency.value,
			total:data.total.value,
			message:data.message.value,
			email:data.email.value,
			as_noname:as_noname,
			type_name:data.type_name.value,
			type_id:data.type_id.value
		},
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