<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax File Upload</title>
	
	<link rel="stylesheet" href="pnotify/pnotify.css">

		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="style.css">

</head>
<body>

	<!-- It's an animated gif. You can download the resources at the end of the article -->

	<div id="pageloader">
   		<img src="25.gif" alt="processing..." />
	</div>


<div class="container">
	<center>
		<div class="form">
				
			<h1>Upload File using Ajax</h1>
				
			<hr>

		<form id="ajaxUpload" method="post" enctype="multipart/form-data">

			<img id="image" src="img.jpg" style="width: 50%" alt=""><br><br>
			
			<input id="file" type="file" name="file" required><br>

			<input style="width: 50%" type="submit" value="Upload" name="submit" class="btn btn-primary">

		</form>

		</div>

	</center>
</div>



<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script src="pnotify/pnotify.js"></script>

	<script>
		$("#ajaxUpload").submit(function(e) {
          e.preventDefault();

           $("#pageloader").fadeIn();


		var formData = new FormData($("#ajaxUpload")[0]);

 setTimeout(
    function() {

$.ajax({
    url: "ajaxUpload.php",
    type: "POST",
    data : formData,
    processData: false,
    contentType: false,
    beforeSend: function() {

    },
    success: function(data){

    	   $("#pageloader").fadeOut();


    	   $("#image").attr("src", "uploads/" + data);


    	  new PNotify({
				title: 'Congratulations',
				text: 'You have successfully uploaded your Image',
				type: 'custom',
				addclass: 'notification-success',
				icon: 'fa fa-check'
			});



    },
    error: function(xhr, ajaxOptions, thrownError) {
       console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    }
});

 }, 1000);


});

	</script>
	
</body>
</html>
