<?php
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
    $statement = $conn->prepare("DELETE TOP(1) FROM appointment WHERE email = '$_POST[email]' AND question = '$_POST[question]' AND categories = '$_POST[categories]' ORDER BY timestamp");
    $statement->execute();
    header("Location: officeHour.php");
?> 
