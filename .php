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
		<?php
		/*
			if (!isset($_GET["mode"])||isset($_GET["mode"])==0)
				include "include/calendar.php";
			elseif(isset($_GET["mode"]==1)
				include "include/dataAnalysis.php";*/
		?>
		<!--script>
			$(document).ready(function() {
				$("#dataAnalysisOption").append("<input type = 'radio' name = 'dataAnalysis' value = 'weekday' id = 0>Number of People v. Weekday<br>");
				$("#dataAnalysisOption").append("<input type = 'radio' name = 'dataAnalysis' value = 'certainOH' id = 1>Number of People v. Certain Office Hour<br>");
				$("#dataAnalysisOption").append("<input type = 'radio' name = 'dataAnalysis' value = 'OH' id = 2>Number of People v. Office Hour<br>");
				$("#dataAnalysisOption").append("<input type = 'radio' name = 'dataAnalysis' value = 'avgResponseTime' id = 3>Average Response Time for TAs");
				$("input[name=dataAnalysis]:radio", "#actualSelect").change(function () {
					$.ajax({
					type: "POST",
					  dataType: "json",
					  url: "include/getDataAnalysis.php", //Relative or absolute path to response.php file
					  data: {mode: $('input[name=dataAnalysis]:checked').attr("id"), 
							 select: $('#actualSelect').children(":selected").attr("id")},
					  success: function(results) {
						// console.log(results);
						var events = [];
						$.each(results, function(k, v, d){
							//var dateArr = getDates(v.weekday, v.startDate, v.endDate);
							//for (var i = 0; i < dateArr.length; i++){
							//var str = ""+dateArr[i][0]+"-"+dateArr[i][1]+"-"+dateArr[i][2];
							//}
						});
						}
    
					});
				})
			});
		</script-->
		<script>
		// var returndata = [];
		$(document).ready(
		function() {
			$("#actualSelect").change(function(){
				
			$("#calendar").fullCalendar('destroy');
			$('#calendar').fullCalendar({
			events: function(start, end, timezone, callback){ 
							console.log("Hello world I want to die1");
				if ($('#actualSelect').val()!=""){
							console.log($('#actualSelect').children(":selected").attr("id"));

					var data = {select: $('#actualSelect').children(":selected").attr("id")};
					if (data != "notID"){
				$.ajax({
					type: "POST",
					  dataType: "json",
					  url: "include/getOH.php", //Relative or absolute path to response.php file
					  data: data,
					  success: function(results) {
						// console.log(results);
						var events = [];
						$.each(results, function(k, v, d){
							var dateArr = getDates(v.weekday, v.startDate, v.endDate);
							for (var i = 0; i < dateArr.length; i++){
							var str = ""+dateArr[i][0]+"-"+dateArr[i][1]+"-"+dateArr[i][2];
							events.push({
								title: v.location,
								start: new Date(str + " " + v.time),
								url: "schedule.php?oh_ID=" + v.OHID,
								allDay: false
							})
							}
							// returndata.push([v.OHID, v.time,v.location, v.weekday, v.startDate, v.endDate]);

							// var dataArr = getDates(v.weekday, v.startDate, v.endDate);
							// for (var i = 0; i < dataArr.length; i++){
							//	var hhmmss = v.time
							//	var date = new Date(v.
							//	console.log(str);
							//	events.push({
							//			title: v.location,
							//			start: str, // will be parsed
							//			url:   "schedule.php?oh_ID="+v.OHID,
							//			allDay: false
							//	});
								
							console.log(events);
						});
						callback(events);
						}
    
					});
				}
				}
				}
				});
			});
			});
		
			/*
			
			// page is now ready, initialize the calendar...
			$("#actualSelect").change(function(){
							console.log("Hello world I want to die1");
				if ($('#actualSelect').val()!=""){
							console.log($('#actualSelect').children(":selected").attr("id"));

					var data = {select: $('#actualSelect').children(":selected").attr("id")};
					$.ajax({
					  type: "POST",
					  dataType: "json",
					  url: "include/getOH.php", //Relative or absolute path to response.php file
					  data: data,
					  success: function(results) {
						  console.log(results);
						$.each(results, function(k, v, d){
							returndata.push([v.OHID, v.time,v.location]);
							console.log(""+v.OHID+v.time+v.location)
						});

						
						

						//alert("Form submitted successfully.\nReturned json: " + data["json"]);
					  }
					});

				}
	
				
				return false;
			});

			$('#calendar').fullCalendar({
					var events = [];
				// put your options and callbacks here
				    eventSources: [

						// your event source
						{
							event.push(
								for (var i = 0; i < returndata.length; i++)
								{
									title: "hello",
									start: "2017-02-14"
								}
							)
						}

						// any other event sources...

					],
			
			eventClick: function(event) {
				if (event.url) {
					window.open(event.url);
					return false;
				}
			}
			*/
			
			var plswork = getDates(1, "2017-11-1", "2018-2-1");
			function getDates(day, startingDate, endingDate){
				var dates = [];
				var daysInMonth = [];
				var sDate = new Date(startingDate);
				var eDate = new Date(endingDate);
				var cYear = sDate.getYear();
				//alert(cYear);
					daysInMonth[0] = [31,29,31,30,31,30,31,31,30,31,30,31];
					daysInMonth[1] = [31,28,31,30,31,30,31,31,30,31,30,31];
				var cDay = sDate.getDay();
				var cDate = sDate.getDate();
				var difference = day - sDate.getDay();
				console.log(difference);
				if (difference < 0)
					difference += 7;
				var duration = Math.abs(DateBtwn(sDate, eDate));
				var remainder = duration%7;
				var week = duration/7;
				var cMonth = sDate.getMonth();
					var aindex = 0;
					if (cYear%4!=0)
						aindex = 1
				if (cDate + difference > daysInMonth[aindex][cMonth])
				{
					console.log("cdate greater case:"+(cDate+difference));
					cDate = cDate + difference - daysInMonth[0][cMonth];
					if (cMonth==11)
					{
						cMonth=0;
						cYear++;
					}
					else
						cMonth++;
					console.log(cDate);
					if (cDate < 10)
					dates.push([cYear+1900, cMonth+1, "0"+cDate]);
					else
					dates.push([cYear+1900, cMonth+1, cDate]);
				}
				else{
						cDate = cDate + difference;
						if (cDate < 10)
						dates.push([cYear+1900, cMonth+1, "0"+cDate]);
						else
						dates.push([cYear+1900, cMonth+1, cDate]);
				}
				duration = duration - difference;
				for (var i = 0; i < duration; i+=7){
				if (cDate + 7 > daysInMonth[aindex][cMonth])
				{
					var index = 0;
					if (cYear%4!=0)
						index = 1
					console.log("cdate greater case:"+(cDate+difference));
					cDate = cDate + 7 - daysInMonth[index][cMonth];
					console.log(daysInMonth[index][cMonth]);
					if (cMonth==11)
					{
						cMonth=0;
						cYear++;
					}
					else
						cMonth++;
					console.log(daysInMonth);
					console.log(cDate);
					if (cDate<10)
					dates.push([cYear+1900, cMonth+1, "0"+cDate]);
					else
					dates.push([cYear+1900, cMonth+1, cDate]);
				}
				else{
						cDate = cDate + 7;
						
						if (cDate<10)
						dates.push([cYear+1900, cMonth+1, "0"+cDate]);
						else
						dates.push([cYear+1900, cMonth+1, cDate]);
				}
				}
				return dates;
				
				
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
		</script>
	</head>
	<body>
	<?php include "include/header.php" ?>
	<div id = "mainbody">
		<div>
			<div>Classes</div>
			<form id = "classSelect">
				<select id = "actualSelect">
					<option id = "nonID" select = "selected">Choose a Class</option>
				<?php
					echo $_SESSION['email'];
					if (isset($_SESSION['email'])){
					$cmd = "SELECT b.class_ID AS classID, b.isEnrolled as isEnrolled, c.name AS className FROM users u INNER JOIN registered b ON u.email = b.email INNER JOIN classes c ON b.class_ID = c.class_ID WHERE u.email= '".trim($_SESSION['email'])."'";
					$statement = $conn->prepare($cmd);
					$statement->execute();
					while($result = $statement->fetch()){
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
			<div id = "dataAnalysisOption"></div>
			
		</div>
	</div>
    </body>
</html>