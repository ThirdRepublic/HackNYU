<?php
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
    $statement = $conn->prepare("INSERT INTO registered VALUES ('$_SESSION[email]', $_POST[class_ID], $_POST[enrolled])");
    $statement->execute();
    header("Location: StudentSelectClasses.php");
?> 
