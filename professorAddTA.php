<?php
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
    //Professor inputs student to promote to TA and class_ID
    //$_POST[TAEmail];
    //$_POST[class_ID];
    $statement = $conn->prepare("SELECT class_ID FROM classes WHERE class_ID = '$_POST[class_ID]'");
    $statement->execute();
    if(!$statement->fetch()){
        $_SESSION["text"] = "Class does not exist\n Please add the class.";
        header("Location: myclasses.php"); 
        exit();
    }
    $statement = $conn->prepare("SELECT staff_ID FROM office_hour WHERE staff_ID = '$_POST[email]'");
    $statement->execute(); 
    if($statement->fetch()){
        $_SESSION["text"] = "This person is already a TA for this class.";
        header("Location: myclasses.php"); 
        exit();
    }
    $statement = $conn->prepare("SELECT email FROM staff WHERE email = '$_POST[email]' AND class_ID = $_POST[class_ID]");
    $statement->execute(); 
    if(!$statement->fetch()){
        $statement = $conn->prepare("INSERT INTO staff VALUES('$_POST[TAEmail]',$_POST[class_ID]) ");
        $statement->execute(); 
    }    
    header("Location: myclasses.php"); 
    exit();
?>