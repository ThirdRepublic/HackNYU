<?php
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
    $statement = $conn->prepare("DELETE FROM appointment WHERE email = '$_POST[email]' AND question = '$_POST[question]' AND categories = '$_POST[categories]' AND queue = $_POST[queue]");
    $statement->execute();
    echo $_POST["email"].$_POST["question"].$_POST["categories"].$_POST["queue"];
    header("Location: officeHour.php");
?> 
