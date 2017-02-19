<!DOCTYPE html>
<html>
    <head>
        <title>TA Select Office Hour</title>
		<?php include "include/headerscript.php" ?>
        <style>  
        </style>
	</head>
	<body>
        <div id = "mainbody" class = "container well">
            <?php 
                include "include/header.php";
                echo "Please select office hours <br><br>";
                $statement = $conn->prepare("SELECT class_ID FROM staff WHERE email = '$_SESSION[email]'"); 
                $statement->execute();
                $aResult = $statement->fetch();
                for($i = 0;$i< sizeof($aResult);$i+=2){
                    $statement = $conn->prepare("SELECT * FROM office_hour WHERE class_ID = $aResult[$i]"); 
                    $statement->execute();
                    echo "Class ID: ".$aResult[$i]."<br>";
                    $alocal = $statement->fetch();
                    if(!is_null($alocal['staff_ID'])){
                        echo "Location:".$alocal['location']." <br>
                        Start time:".$alocal['time_Begin']."<br>
                        Duration:".$alocal['duration']."<br>
                        Registered Office Hour<br><br>";
                        continue 1;
                    }
                    $statement = $conn->prepare("SELECT oh_ID, time_Begin, duration FROM office_hour WHERE class_ID = $aResult[$i]"); 
                    $statement->execute();
                    $possibleSlots = $statement->fetchAll();
                    foreach($possibleSlots as $possibleSlots => $aSlot)
                    {
                        echo "<form action='InsertTAIntoOfficeHour.php' method='POST'> 
                            <input type = 'hidden' name = 'oh_ID' value = '$aSlot[oh_ID]'> 
                            <input name = 'location' placeholder = 'Insert Location Here' type = 'text'> <br>
                            Start time: $aSlot[time_Begin] <br>
                            Duration: $aSlot[duration] <br>
                            <input value = 'Select Time Slot' type='submit'>
                        </form><br><br>";
                    }
                $aResult++;    
                }
            ?>
        </div>
    </body>
</html>

                }