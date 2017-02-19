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
                if(isset($_SESSION["text"])){   
                    echo "<div class = 'error'>".$_SESSION['text']."</div>";
                    $_SESSION["text"] = "";
                }
                $IsStaff = false;
                $statement = $conn->prepare("SELECT email FROM staff WHERE email = '$_SESSION[email]'");
                $statement->execute();
                if($statement->fetch())
                    $IsTAorProfessor = true;
                $statement = $conn->prepare("SELECT email, question, categories, queue
                                            FROM
                                            (SELECT bookmarked.email, bookmarked.class_ID FROM staff 
                                            INNER JOIN bookmarked
                                            ON staff.class_ID = bookmarked.class_ID WHERE staff.email = '$_SESSION[email]') as a
                                            INNER JOIN
                                            (SELECT class_ID, question, categories, queue FROM office_hour 
                                            INNER JOIN appointment 
                                            ON office_hour.oh_ID = appointment.oh_ID) as b
                                            ON a.class_ID = b. class_ID");
                $statement->execute();
                $result = $statement->fetchAll();
                foreach($result as $result => $case){
                    echo "Email: ".$case[0]." <br>
                    Catergory: ".$case[2]." <br>
                    Purpose of visit: ".$case[1]." 
                    <form action='removeOfficeHour.php' method='POST'>
                        <input type='hidden' name='email' value=$case[0]>
                        <input type='hidden' name='question' value=$case[1]>
                        <input type='hidden' name='categories' value=$case[2]>
                        <input type='hidden' name='queue' value=$case[3]>
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