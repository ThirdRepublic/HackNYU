<!DOCTYPE html>
<html>
    <head>
        <title></title>
		<link href="https://fonts.googleapis.com/css?family=ABeeZee|Open+Sans" rel="stylesheet">
	<style>
		#logo{
			position: fixed;
			left: -15px;
			top: -59px;
		}
		text{
			font-family: 'ABeeZee', sans-serif;
		}
		.Aplus{
			font-size: 17pt;
		}
		#navbar{
			background-color:#382e2e;
			position: fixed;
			top:0px;
			left:0px;
			right:0px;
			height: 55px;
			text-align: right;
		}
		#navbar a {
			color: #ff4949;
			font-family: 'ABeeZee', sans-serif;
			text-align: center;
			margin-right: 15px;
			text-decoration: none;
			-webkit-transition: .35s ease-in-out;
			transition: .35s ease-in-out;
			padding-left: 5px;
			padding-right: 5px;
		}
		.navcontainer {
			margin-top: 22px;
		}
		#mainbody{
			margin-top:55px;
		}
		#navbar a:hover {
			color: white;
		}
		#subprofile{
			/*display: none;*/
			display: block;
			text-align: center;
			position: fixed;
			background-color: #382e2e;
			right: 0px;
			width: 80px;
			top:50px;
		}
		#subprofile a{
			margin-right:6px;
			margin-left:4px;
		}
		#subprofile div{
			padding-top:5px;
			padding-bottom: 5px;
		}
		#subprofile {
			display:none;
		}
		
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#subprofile").hide();
			$("#profile").click(function(){
				$("#subprofile").show();
			});
			$("#profile").mouseenter(function(){
				$("#subprofile").show();
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