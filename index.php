<!DOCTYPE html>
<html>
    <head>
        <title></title>
		<?php include "include/headerscript.php" ?>
	</head>
	<body>
	<div id = "navbar">
		<div id = "logo"><?php include "logo/logo.php"?></div>
	</div>
	<div id = "mainbody">
    <?php
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
    if(isset($_SESSION["text"])){	
        echo "<div>".$_SESSION['text']."</div>";
        $_SESSION["text"] = "";
    }
    if (!isset($_SESSION["email"])) {
        echo "
            <div>Login</div>
            <form action='logIn.php' method='POST'>
                <input name='email' type='text' placeholder='Email'> <br>
                <input name='password' type='password' placeholder='Password'> <br>
                <input type='submit'>
            </form>
            <br><br>
            <div>Register</div>
            <form action='register.php' method='POST'>
				<input name = 'FName' placeholder = 'First Name' type = 'text' /> <br>
                <input name = 'LName' placeholder = 'Last Name' type = 'text' /> <br>
				<input name = 'email' placeholder = 'Email' type = 'text' /> <br>
				<input name = 'password' type= 'password' placeholder = 'Password'/> <br>
                <input name = 'IsStudent' value = 1 checked = 'checked' type = 'radio'> Student
                <input name = 'IsStudent' value = 0 type = 'radio'> Professor <br>
                <input type='submit'>
            </form>
        ";
    } 
    else {
        $cmd = "SELECT FName, LName FROM users WHERE email= '$_SESSION[email]'";
		$statement = $conn->prepare($cmd);
		$statement->execute();
		$result = $statement->fetch();
        echo "<form action = 'logOut.php' method='POST'>
            <span>Welcome, $result[FName] $result[LName] </span> <br>
            <input type='submit' value='Log Out'>
        </form>
        ";
    }
    ?>
	</div>
    </body>
</html>