<!DOCTYPE html>
<html>
    <head>
        <title></title>
		<?php include "include/headerscript.php" ?>
		<link rel='stylesheet' href='api/fullcalendar/fullcalendar.css' />
		<script src='api/fullcalendar/lib/jquery.min.js'></script>
		<script src='api/fullcalendar/lib/moment.min.js'></script>
		<script src='api/fullcalendar/fullcalendar.js'></script>
		<style>
			#myclasses{
				border-bottom: 1.5px solid #ff4949;
			}
			#calendar{
				width: 300px;
			}
		</style>
		<script>
		$(document).ready(function() {

			// page is now ready, initialize the calendar...

			$('#calendar').fullCalendar({
				// put your options and callbacks here
			})

		});
		</script>
	</head>
	<body>
	<?php include "include/header.php" ?>
	<div id = "mainbody">
		<div>
			<div>Classes</div>
			<?php
			/*
				$cmd = "SELECT b.class_ID AS classID, b.isEnrolled as isEnrolled, c.name AS className FROM users u INNER JOIN bookmarked b ON u.email = b.email INNER JOIN classes c ON b.class_ID = c.class_ID WHERE email= '$_SESSION[email]'";
				$statement = $conn->prepare($cmd);
				$statement->execute();
				while($result = $statement->fetch_assoc()){
					echo "<div id = ".$result['classID']." class = ".$result['isEnrolled'].">";
					echo $result["className"];
					echo "</div>";
				}
*/
			?>
			<div id = "calendar"></div>
			
		</div>
	</div>
    </body>
</html>