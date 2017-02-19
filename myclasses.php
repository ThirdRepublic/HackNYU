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
				width: 80%;
				margin-left: 10%;
			}
		</style>
		<script>
		$(document).ready(function() {
			var returndata = [];
			// page is now ready, initialize the calendar...
			$("#classSelect").submit(function(){
				if ($('#departmentselect').val()!=""){

					var data = {select: $('#departmentselect').val()};
					$.ajax({
					  type: "POST",
					  dataType: "json",
					  url: "include/getOH.php", //Relative or absolute path to response.php file
					  data: data,
					  success: function(data) {
						$.each(results, function(k, v){
							returndata.push([v.OHID, v.time,v.location]);
						});

						  
						

						//alert("Form submitted successfully.\nReturned json: " + data["json"]);
					  }
					});
				}
	
				
				return false;
			});

			$('#calendar').fullCalendar({
				// put your options and callbacks here
				    eventSources: [

						// your event source
						{
							events: function(start, end, timezone, callback){// put the array in the `events` property
								for (var i = 0; i < returndata.length; i++)
								{
									events.push({
										title  : 'event1',
										start  : '2017-02-09T15:00:00',
										url    : 'schedule.php?oh_ID='+returndata[0]
									});
								}
							
							}
						}

						// any other event sources...

					],
			
			eventClick: function(event) {
				if (event.url) {
					window.open(event.url);
					return false;
				}
			}
			

		})
			function getDates(day, startingDate, endingDate){
				var sDate = new Date(startingDate);
				var eDate = new Date(endingDate);
				var startDay = sDate.getDay();
				var difference = day - startDay;
				if (difference < 0)
					difference += 7;
				var duration = Math.abs(DateBtwn(starting));
				var remainder = duration%7;
			}
			function DateBtwn( date1, date2 ) {
			  //Get 1 day in milliseconds
			  var one_day=1000*60*60*24;

			  // Convert both dates to milliseconds
			  var date1_ms = date1.getTime();
			  var date2_ms = date2.getTime();

			  // Calculate the difference in milliseconds
			  var difference_ms = date2_ms - date1_ms;
				
			  // Convert back to days and return
			  return Math.round(difference_ms/one_day); 
			}
		;})
		</script>
	</head>
	<body>
	<?php include "include/header.php" ?>
	<div id = "mainbody">
		<div>
			<div>Classes</div>
			<form id = "classSelect">
				<select id = "actualSelect">
				<?php
					if (isset($_SESSION['email'])){
					$cmd = "SELECT b.class_ID AS classID, b.isEnrolled as isEnrolled, c.name AS className FROM users u INNER JOIN bookmarked b ON u.email = b.email INNER JOIN classes c ON b.class_ID = c.class_ID WHERE email= '$_SESSION[email]'";
					$statement = $conn->prepare($cmd);
					$statement->execute();
					while($result = $statement->fetch_assoc()){
						echo "<option id = ".$result['classID']." class = ".$result['isEnrolled'].">";
						echo $result["className"];
						echo "</option>";
					}
					}
					else
					{
						header("Location: index.php");
					}

				?>
				</select>
			</form>
			<div id = "calendar"></div>
			
		</div>
	</div>
    </body>
</html>