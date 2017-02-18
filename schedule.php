<!DOCTYPE html>
<html>
    <head>
        <title>Schedule</title>
		<?php include "include/headerscript.php" ?>
	</head>
	<body>
        <?php 
            include "include/header.php"   
            session_start();
            $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
        ?>
        <div id = "mainbody">
        <?php
        session_start();
        $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
        
        ?>
        </div>
    </body>
</html>