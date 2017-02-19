<?php
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
    $statement = $conn->prepare("UPDATE office_hour SET staff_ID = '$_SESSION[email]', location = '$_POST[location]' WHERE oh_ID = '$_POST[oh_ID]' ");
    $statement->execute();
    header("Location: TASelectOfficeHour.php");
?> 