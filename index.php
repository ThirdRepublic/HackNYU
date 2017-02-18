<!DOCTYPE html>
<html>
    <head>
        <title></title>
		<link href="https://fonts.googleapis.com/css?family=ABeeZee|Open+Sans" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
	<link rel = "stylesheet" href = "css/main.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#subprofile").hide();
			$("#profile").click(function(){
				$("#subprofile").fadeToggle();
			});
		});
	</script>
    </head>
    <body>
	<div id = "navbar">
		<div id = "logo"><?php include "logo/logo.php"?></div>
		<div class = "navcontainer">
			<a href = "officehour.php">Office Hour</a><!--add a drop tab there for prof and ta-->
			<a href = "myclasses.php">My Classes</a>
			<a href = "help.php">Help</a>
			<a id = "profile">Profile</a><br>
			<div id = "subprofile">
				<div><img alt = "pfp"></div>
				<div><a href = "setting.php">Setting</a></div>
				<div><a href = "logout.php">Logout</a></div>
			</div>
		</div>
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