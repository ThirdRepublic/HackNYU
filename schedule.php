<!DOCTYPE html>
<html>
    <head>
        <title>Schedule</title>
		<?php include "include/headerscript.php" ?>
	</head>
	<body>
        <div id = "mainbody">
            <?php 
                include "include/header.php"; 
                session_start();
                $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
                if(!isset($_SESSION["oh_ID"])){
                    $_SESSION["oh_ID"] = $_GET["oh_ID"];
                }
                if(isset($_SESSION["text"])){	
                    echo "<div>".$_SESSION['text']."</div>";
                    $_SESSION["text"] = "";
                }
                echo "<div>Register for an appointment</div>
                <form action='confirmSchedule.php' method='POST'>
                    <input name = 'categories' value = 'review' type = 'radio' checked = 'checked'> Review <br>
                    <input name = 'categories' value = 'homework' type = 'radio'> Homework <br>
                    <input name = 'categories' value = 'other' type = 'radio'> Other <br>
                    <input name = 'question' type='text' placeholder='Ask your question here: '> <br>
                    <input value = 'confirm' type='submit'>
                </form>"
            ?>
        </div>
    </body>
</html>