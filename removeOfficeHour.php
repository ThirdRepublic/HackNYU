<?php
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
    //email, question, categories, timestamp 
    $statement = $conn->prepare("Delete FROM appoinment WHERE email = '$_POST[email]' AND question = '$_POST[question]' AND categories = '$_POST[categories]' AND timestamp = '$_POST[timestamp]' ");
    $statement->execute();
    $_SESSION["text"] = "Deleted";
    header("Location: officeHour.php");
?>
