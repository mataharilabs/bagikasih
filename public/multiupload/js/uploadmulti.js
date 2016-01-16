$(document).ready(function(){
	var statusElem = $("#status");
	$("#image").uploadFile({
		url: base_url + "/photo/multi",
		method: "POST",
		// allowedTypes:"jpg,png,gif,doc,pdf,zip",
		allowedTypes: "jpg,png,gif",
		fileName: "myfile",
		multiple: true,
		onSuccess: function(files,data,xhr){
			statusElem.html("<font color='green'>Upload is success</font>");
		},
		afterUploadAll: function(){
			statusElem.hide();
		},
		onError: function(files, status, errMsg){
			statusElem.html("<font color='red'>Upload is Failed</font>");
			statusElem.hide();
		}
	});
});

