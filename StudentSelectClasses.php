<!DOCTYPE html>
<html>
    <head>
        <title>Student Select Classes</title>
		<?php include "include/headerscript.php" ?>
        <meta name="viewport" content="width=device-width">
        <style>  
        </style>
	</head>
	<body>
        <div id = "mainbody" class = "container well">
            <?php 
                include "include/header.php";
                if(isset($_SESSION["text"])){   
                    "<div class = 'error'>".$_SESSION['text']."</div>";
                    $_SESSION["text"] = "";
                }       
                echo "<div> Add a class</div> 
                    <form action='StudentAddClass.php' method='POST'> 
                    <input name = 'class_ID' type = 'text' placeholder = 'Insert Class Here'> <br> 
                    <input name = 'enrolled' value = 1 type = 'radio'> Is Enrolled<br>
                    <input name = 'enrolled' value = 0 type = 'radio' checked> Not Enrolled<br>
                    <input value = 'Add Class' type='submit'>
                </form><br><br>";
            ?>    
       </div>
    </body>
</html>    