function create_event(data){
	var event_category_id = data.event_category_id.value;
	var city_id = data.city_id.value;
	var name = data.name.value;
	var description = data.description.value;
	var user_id = data.user_id.value;
	var stewardship = data.stewardship.value;
	var location = data.location.value;
	var email = data.email.value;
	var website_url = data.website_url.value;
	if(user_id == ''){
		$("#createEvent").fadeOut(1000,function(){
			$("#signin").fadeIn(100);
			return false;
		});
	}
	return false;
}


