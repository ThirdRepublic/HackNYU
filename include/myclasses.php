<!DOCTYPE html>
<html>
    <head>
        <title></title>
		<?php include "headerscript.php" ?>
        <meta name="viewport" content="width=device-width">
		<link rel='stylesheet' href='../api/fullcalendar/fullcalendar.css' />
		<script src='../api/fullcalendar/lib/jquery.min.js'></script>
		<script src='../api/fullcalendar/lib/moment.min.js'></script>
		<script src='../api/fullcalendar/fullcalendar.js'></script>
		<script src="https://d3js.org/d3.v4.min.js"></script>
		<style>
			#myclasses{
				border-bottom: 1.5px solid #ff4949;
			}
			#calendar{
				width: 80%;
				margin-left: 10%;
			}
			.title{
				
				font-family: 'ABeeZee', sans-serif;
				color:#ff4949;
				font-size: 15pt;
				padding: 5px;
			}
			form{
				padding: 5px;
			}
		</style>
		<?php
		/*
			if (!isset($_GET["mode"])||isset($_GET["mode"])==0)
				include "include/calendar.php";
			elseif(isset($_GET["mode"]==1)
				include "include/dataAnalysis.php";*/
		?>
		<script>
            // var returndata = [];
            $(document).ready(
            function(){
                $("#actualSelect").change(function(){
                    $("#output").hide();	
                    $("#calendar").fullCalendar('destroy');
                    $('#calendar').fullCalendar({
                        events:function(start, end, timezone, callback){ 
                            console.log("Hello world I want to die1");
                            if ($('#actualSelect').val()!=""){
                                console.log($('#actualSelect').children(":selected").attr("id"));
                                var data = {select: $('#actualSelect').children(":selected").attr("id")};
                                if (data != "notID"){
                                    $.ajax({
                                        type: "POST",
                                        dataType: "json",
                                        url: "getOH.php", //Relative or absolute path to response.php file
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
                                                        url: "scheduleAppointment.php?oh_ID=" + v.OHID + "&oh_date=" + str,
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
                                else
                                    $("#calendar").fullCalendar('destroy');
                            }
                        }
                    });
                });
            });
			
			//var plswork = getDates(1, "2017-11-1", "2018-2-1");
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
				if (cDate + difference > daysInMonth[aindex][cMonth]){
					console.log("cdate greater case:"+(cDate+difference));
					cDate = cDate + difference - daysInMonth[0][cMonth];
					if (cMonth==11){
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
                    if (cDate + 7 > daysInMonth[aindex][cMonth]){
                        var index = 0;
                        if (cYear%4!=0)
                            index = 1
                        console.log("cdate greater case:"+(cDate+difference));
                        cDate = cDate + 7 - daysInMonth[index][cMonth];
                        console.log(daysInMonth[index][cMonth]);
                        if (cMonth==11){
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
		<!--script>
			$(document).ready(function() {
				$("#dataAnalysisOption").append("<option id = 0>Number of People v. Weekday</option>");
				$("#dataAnalysisOption").append("<option id = 1>Number of People v. Certain Office Hour</option>");
				$("#dataAnalysisOption").append("<option id = 2>Number of People v. Office Hour</option>");
				$("#dataAnalysisOption").append("<option id = 3>Average Response Time for TAs</option>");
				$("#btn").append("Go");
				$("#btn").click(function () {
					
					var svg = d3.select("svg");
					console.log("hello");
					console.log($('#dataAnalysisOption').children(":selected").attr("id"));
					$.ajax({
					type: "POST",
					  dataType: "json",
					  url: "include/getDataAnalysis.php", //Relative or absolute path to response.php file
					  data: {mode: $('#dataAnalysisOption').children(":selected").attr("id"), 
							 select: $('#actualSelect').children(":selected").attr("id")},
					  success: function(results) {
						  console.log(results);
						  
						d3.json(results, function(data){
							console.log(data);
							var dateScale = d3.scaleTime().domain([new Date(results.OHDate), new Date(results.OHDate)]).range([0,350]);
							var dateAxis = d3.axisBottom(dateScale);
							var freqScale = d3.scaleLinear().domain([0,10]).range([350,0]);
							var freqAxis = d3.axisLeft(freqScale);
							var sectorScale = d3.scaleOrdinal(d3.schemeCategory20);

							var plot = svg.append("g").attr("transform", "translate(40,30)");
							plot.append("g").call(dateAxis).attr("transform", "translate(0,350)");
							plot.append("g").call(freqAxis).attr("transform", "translate(0,0)");

							var pathGenerator = d3.line()
							.x(function (d) { return dateScale(d.OHDate); })
							.y(function (d) { return freqScale(d.Frequency); });
						})
						}
    
					});
				})
			});
		</script-->
	</head>
	<body>
        <?php include "header.php"; ?>
        <div id = "mainbody">
            <div>
                <?php
                    if(isset($_SESSION["text"])){	
                        echo "<div id = 'output'>".$_SESSION['text']."</div>";
                        unset($_SESSION["text"]);
                    }
                ?> 
                <div class = "title">Classes</div>
                <form id = "classSelect">
                    <select id = "actualSelect">
                        <option id = "nonID" select = "selected">Choose a Class</option>
                        <?php
                            echo $_SESSION['email'];
                            if (isset($_SESSION['email'])){
                                $cmd = "SELECT b.class_ID AS classID, b.isEnrolled as isEnrolled, c.name AS className FROM users u INNER JOIN registered b ON u.email = b.email INNER JOIN classes c ON b.class_ID = c.class_ID WHERE u.email= '".$_SESSION['email']."'";
                                $statement = $conn->prepare($cmd);
                                $statement->execute();
                                while($result = $statement->fetch()){
                                    echo "<option id = ".$result['classID']." class = ".$result['isEnrolled'].">";
                                    echo $result["className"];
                                    echo "</option>";
                                }
                            }
                            else
                                header("Location: ../index.php");
                        ?>
                    </select>
                </form>
                <div id = "calendar"></div>
                <!--form id = "modeselect">
                <select id = "dataAnalysisOption"></select>
                </form>
                <div id = "btn"></div>
                <svg>
                </svg-->
            </div>
        </div>
    </body>
</html>