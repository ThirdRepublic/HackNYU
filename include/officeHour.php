<!DOCTYPE html>
<html>
    <head>
        <title>Office Hour</title>
		<?php include "headerscript.php" ?>
        <meta name="viewport" content="width=device-width">
        <style>
            #mainbody{
                font-family: 'Open Sans', sans-serif;
            }
           .error{
                color:red;
           }
           .well{
                margin-left:50px;
                margin-top:100px;
           }
        </style>
	</head>
	<body>
        <div id = "mainbody">
            <?php 
                include "header.php";
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
                                            (SELECT registered.email, registered.class_ID FROM staff 
                                            INNER JOIN registered
                                            ON staff.class_ID = registered.class_ID WHERE staff.email = '$_SESSION[email]') as a
                                            INNER JOIN
                                            (SELECT class_ID, question, categories, queue FROM office_hour 
                                            INNER JOIN appointment 
                                            ON office_hour.oh_ID = appointment.oh_ID) as b
                                            ON a.class_ID = b. class_ID");
                $statement->execute();
                $result = $statement->fetchAll();
                foreach($result as $result => $case){
                    echo "<div class ='container well'>
                    Email: ".$case[0]." <br>
                    Category: ".$case[2]." <br>
                    Purpose of visit: ".$case[1]." 
                    <form action='removeOfficeHour.php' method='POST'>
                        <input type='hidden' name='email' value=$case[0]>
                        <input type='hidden' name='question' value=$case[1]>
                        <input type='hidden' name='categories' value=$case[2]>
                        <input type='hidden' name='queue' value=$case[3]>
                        <input value = 'Close Appointment' type='submit'>
                    </form>
                    <br> <br>
                    </div>
                    ";
                }
                "<br> <br>";
               
            ?>    
        </div>
    </body>
</html>