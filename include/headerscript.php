	<?php
		session_start();
		$conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
	?>

	<link href="https://fonts.googleapis.com/css?family=ABeeZee|Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
	<link rel = "stylesheet" href = "../css/main.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#subprofile").hide();
			$("#profile").click(function(){
				$("#subprofile").fadeToggle();
			});
		});
	</script>
