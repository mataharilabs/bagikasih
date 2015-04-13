function action(data)
{
	if (data.value == 1)
	{
		// alert('Konfirmasi');
	}
	else if (data.value == 2)
	{
		var donations = [];
		var total = 0;

		$('input[name="donations"]:checkbox').each(function(e) {
			console.log(e.donation);
			if (this.checked)
			{
				donations[total] = $(this).val();
				total = total+1;
			}
		});
		
		if (total > 0)
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
		else
		{
			alert('Tidak ada satupun donasi yang anda pilih');
		}
		
		$("select#action").prop('selectedIndex', 0);
	}

	return false;
}