<script type="text/javascript">
$(function(){
	$('#typeName').on('change', function(){
		var val = $('#typeName').val();
		var url = '/photo/ajax/?type_name=' + val;
		alert(url);
		$.ajax(function(){
			type: 'POST',
			url: url, 
			success: function(response){
				$('#typeIdAdd').removeClass('hide');
				$('#typeIdAdd').html(response);
			},
			error : function(){
				alert('Error occured!');
			}
		});

	});
});
</script>