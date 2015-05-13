<script type="text/javascript">
$(function(){
	$(document).on('change', '#typeName', function(){
		$.ajax({
			method: 'POST',
			url: '/photo/ajax',
			data: { type_name: $('#typeName').val() },
			success : function(response){
				// console.log(response);
				$('#typeIdAdd').removeClass('hide');
				$('#typeIdAdd').html(response);
			},
				error : function(){
					alert('Error occured!');
				}
		})

	});
});
</script>