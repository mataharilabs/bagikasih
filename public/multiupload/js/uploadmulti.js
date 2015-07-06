	$(document).ready(function() {
	    var settings = {
	        url: "upload.php",
	        method: "POST",
	        // allowedTypes:"jpg,png,gif,doc,pdf,zip",
	        allowedTypes: "jpg",
	        fileName: "myfile",
	        multiple: true,
	        onSuccess: function(files, data, xhr) {
	            $("#status").html("<font color='green'>Upload is success</font>");
	        },
	        afterUploadAll: function() {
	            $("#status").hide();
	            // alert("all images uploaded!!");
	        },
	        onError: function(files, status, errMsg) {
	            $("#status").html("<font color='red'>Upload is Failed</font>");
	            $("#status").hide();
	        }
	    }
	    $("#image").uploadFile(settings);
	});