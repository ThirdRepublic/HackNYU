<?php
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
    $FName = $_POST["FName"];
    $LName = $_POST["LName"];
    $email = $_POST["email"];
    $IsStudent = $_POST["IsStudent"];                
    $password = $_POST["password"];
    // if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        // $_SESSION["text"] = "Not a vaild email";
		// header("Location: index.php");
    // }
    // else
        if(!preg_match("/^[a-zA-Z]*$/",$FName) || !preg_match("/^[a-zA-Z]*$/",$LName)){
            $_SESSION["text"] = "Name can only contain letters";
            header("Location: index.php"); 
        }
        else
            if(!preg_match("/^[a-zA-Z0-9\~!@#$%^&*_]*$/",$password)){
                $_SESSION["text"] = "Password may only contain A-Z, a-z, 0-9, ~, !, @, #, $, %, ^, &, *, _)";
                header("Location: index.php");
            }
            else
                if($FName==null || $LName==null || $email==null || $password==null){	
                    $_SESSION["text"] = "You cannot leave any field blank.";
                    header("Location: index.php");
                }
                else{
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $statement = $conn->prepare("SELECT email FROM users WHERE email = '$email'");
                    $statement->execute();
                    if (($statement->fetch()) == false){
                        $statement = $conn->prepare("INSERT INTO users VALUES ('$email','$FName', '$LName','$IsStudent','$hashedPassword')");
                        $statement->execute();
                        $_SESSION["text"] = "Account Created.";
                        header("Location: index.php");
                    }
                    else{
                        $_SESSION["text"] = "Email is already used.";
                        header("Location: index.php");
                    }
                }    
                
?>