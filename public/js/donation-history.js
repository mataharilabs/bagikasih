function action(data)
{
	var donations = [];
	var total = 0;
	var total_donasi = 0;
	var currency = 'IDR';
	var donation_ids = '';

	$("#konfirmasi").hide();

	$('input[name="donations"]:checkbox').each(function(e) {
		console.log(e.donation);
		if (this.checked)
		{
			donations[total] = $(this).val();
			
			total_donasi = total_donasi + parseInt($('#' + $(this).val() + '_total').val());
			currency = $('#' + $(this).val() + '_currency').val();

			if (total > 0)
			{
				donation_ids = donation_ids + ',';	
			}
			
			donation_ids = donation_ids + $(this).val();

			total = total+1;
		}
	});

	if (total > 0 && data.value > 0)
	{
		if (data.value == 1)
		{
			$('#bank_to').prop('selectedIndex', 0);
			$('#total').val(total_donasi);
			$('#donation_ids').val(donation_ids);
			$("select#currency").prop('selectedIndex', currency);
			$('#modal-donation-confirmation').modal('show');
		}
		else if (data.value == 2)
		{
		
			if(confirm('Apakah Anda ingin membatalkan '+total+' donasi ?'))
			{
				$.ajax({
					type: "POST",
					data: {donations:donations},
					url: "/delete-donation",
					success: function(msg){
						alert('Proses pembatalan berhasil');
						location.reload();
					}
				});
			}
		}
	}
	else if (total == 0 && data.value > 0)
	{
		alert('Tidak ada satupun donasi yang anda pilih');
	}

	$("select#action").prop('selectedIndex', 0);
	return false;
}

function donationConfirmation(data)
{
	$("#donation-confirmation-alert").hide();
	$("#donation-confirmation-alert").empty();
	
	var currency = data.currency.value;
	var total = data.total.value;
	var transferred_at = data.transferred_at.value;
	var to_bank = data.to_bank.value;
	var bank_name = data.bank_name.value;
	var bank_account = data.bank_account.value;
	var bank_account_name = data.bank_account_name.value;
	var message = data.message.value;
	var donation_ids = data.donation_ids.value;
	var senddata  = 'currency='+currency+'&total='+total+'&transferred_at='+transferred_at+'&to_bank='+to_bank+'&bank_name='+bank_name+'&bank_account='+bank_account+'&bank_account_name='+bank_account_name+'&message='+message+'&donation_ids='+donation_ids;
	var failure = '';

	$.ajax({
		url: "/donation-confirmation",
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

			  	$("#donation-confirmation-alert").append(failure);
			  	$("#donation-confirmation-alert").show();
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