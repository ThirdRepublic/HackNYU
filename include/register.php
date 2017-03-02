<?php
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
    $FName = $_POST["FName"];
    $LName = $_POST["LName"];
    $email = $_POST["email"];
    $IsStudent = $_POST["IsStudent"];                
    $password = $_POST["password"];
    if($FName==null || $LName==null || $email==null || $password==null)	
        $_SESSION["text"] = "You cannot leave any field blank.";
    else
        if(!preg_match("/^[a-zA-Z]*$/",$FName) || !preg_match("/^[a-zA-Z]*$/",$LName))
            $_SESSION["text"] = "Name can only contain letters.";
        else
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                $_SESSION["text"] = "Not a vaild email.";
            else
                if(!preg_match("/^[a-zA-Z0-9\~!@#$%^&*_]*$/",$password))
                    $_SESSION["text"] = "Password may only contain A-Z, a-z, 0-9, ~, !, @, #, $, %, ^, &, *, _)";
                else{
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $statement = $conn->prepare("SELECT email FROM users WHERE email = '$email'");
                    $statement->execute();
                    if(($statement->fetch()) == false){
                        $statement = $conn->prepare("INSERT INTO users VALUES ('$email','$FName', '$LName','$IsStudent','$hashedPassword', 'NULL')");
                        $statement->execute();
                        $_SESSION["text"] = "Account created.";
                    }
                    else
                        $_SESSION["text"] = "Email is already used.";
                }    
    header("Location: ../index.php?error=t");            
?>