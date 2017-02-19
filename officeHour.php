<!DOCTYPE html>
<html>
    <head>
        <title>Office Hour</title>
		<?php include "include/headerscript.php"?>
        <style>
           
        </style>
	</head>
	<body>
        <div id = "mainbody">
            <?php 
                include "include/header.php";
                // $IsTAorProfessor = false;
                // $statementA = $conn->prepare("SELECT isTA FROM users WHERE email = '$_SESSION[email]'");
                // $statementA->execute();
                // $statementB = $conn->prepare("SELECT isStudent FROM users WHERE email = '$_SESSION[email]'");
                // $statementB->execute();
                // if($statementA->fetch() || !$statementB->fetch()){
                    // $IsTAorProfessor = true;
                // }
                $statement = $conn->prepare("SELECT email, question, categories 
                                            FROM
                                            (SELECT bookmarked.email, bookmarked.class_ID FROM staff INNER JOIN bookmarked
                                            ON staff.class_ID = bookmarked.class_ID WHERE staff.email = '$_SESSION[email]') as a
                                            INNER JOIN
                                            (SELECT class_ID, question, categories FROM office_hour INNER JOIN appointment 
                                            ON office_hour.oh_ID = appointment.oh_ID) as b
                                            ON a.class_ID = b. class_ID");
                $statement->execute();
                $result = $statement->fetchAll();
                foreach($result as $result => $case){
                    echo "Name: ".$case[0]." <br>
                    Purpose of visit: ".$case[1]." <br>
                    Catorgory: ".$case[2]." 
                    <form action='removeOfficeHour.php' method='POST'>
                        <input type='hidden' name='' value=''>
                        <input value = 'Close Appointment' type='submit'>
                    </form>
                    <br> <br>
                    ";
                }
                "<br> <br>";
               
            ?>    
        </div>
    </body>
</html>