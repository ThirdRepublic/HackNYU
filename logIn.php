<?php
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");   
	if($_POST["email"]==null || $_POST["password"]==null){	
		$_SESSION["text"] = "You cannot leave any field blank.";
		header("Location: index.php");
	}
    $cmd = "SELECT password FROM users WHERE email='$_POST[email]'";
    $statement = $conn->prepare($cmd);
    $statement->execute();
    $result = $statement->fetch();
    if ($result && password_verify($_POST["password"], $result["password"])){
        $_SESSION["email"] = $_POST['email'];
        header("Location: index.php");
    }
    else{
        $_SESSION["text"] = "Not an valid account.";
        header("Location: index.php");
    }
    
?>