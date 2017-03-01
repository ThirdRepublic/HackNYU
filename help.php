<!DOCTYPE html>
<html>
    <head>
        <?php include "include/headerscript.php" ?>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="viewport" content="width=device-width">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="css/main.css" rel = "stylesheet">
        <link href="https://fonts.googleapis.com/css?family=ABeeZee|Open+Sans" rel="stylesheet">
        <title>Help/FAQ</title>
		<script>
			$(document).ready(function(){
				$("#contact").hide();
				$("#contactbtn").click(function(){
					$("#contact").fadeIn(500);
				});
				$(".bg").click(function(){
					$("#contact").fadeOut(500);
				});
			});
		</script>
        <style>
            .container{
                margin-top:100px;
                font-family: 'Open Sans', sans-serif;
				z-index: -1;
            }
            .panel-body{
                color:#ff4949;
            }
            .pun{
                font-weight:bold;
                text-decoration:none;
            }
			#contactbtn{
				position:fixed;
				color: #ff4949;
				font-family: 'ABeeZee', sans-serif;
				right: 10px;
				bottom: 10px;
			}
			.bg {
				position: fixed;
				top: 0px;
				bottom: 0px;
				left: 0px;
				right: 0px;
				opacity: 0.5;
				background-color: black;
				z-index: 1;
			}
			.formcontainer {
				z-index: 900;
				position:fixed;
				top: 25%;
				width: 340px;
				left:40%;
				right:50%;
				background-color: white;
				border-radius: 15px;
				padding: 20px;
			}
			.formcontainer input {
				border-bottom: 1px solid black;
				border-top: none;
				border-left: none;
				border-right: none;
				width: 290px;
				-webkit-transition: .35s ease-in-out;
				transition: .35s ease-in-out;
			}
			.formcontainer input:focus {
				border-bottom: 1px solid #ff4949;
				color: #ff4949;
			}
			.submit input {
				border: 1px solid #ff4949;
				background-color: white;
				color: #ff4949;
			}
			.submit input:hover {
				border: 1px solid white;
				background-color: #ff4949;
				color: white;
			}
			.formcontainer div {
				margin: 5px;
			}
			.formcontainer > div {
				font-size: 14pt;
				color: #ff4949;
				font-family: 'ABeeZee', sans-serif;
			}
			textarea {
				border: 1px solid black;
				color: black;
				-webkit-transition: .35s ease-in-out;
				transition: .35s ease-in-out;
			}
			textarea:focus {
				border: 1px solid #ff4949;
				color: #ff4949;
			}
        </style>
		<?php		
			if (isset($_POST["Email"])&&isset($_POST['message'])&&isset($_POST['subject'])){
				//if (!isset($_POST["name"]))
					//$name = "";
				
				mail($_POST["Email"],$_POST['subject'],$_POST["message"]);
			}
			?>
    </head>
    <body>
        <?php include "include/header.php" ?>
        <div class="container panel panel-default">
            <div class = "panel panel-body">1) What is this?</div>
            <div class = "panel panel-footer">
                This is a website with the purpose of allowing students and professors to organize office hours for classes.
            </div>
            <div class = "panel panel-body">2) Why do I care?</div>
            <div class = "panel panel-footer">
                Most students tend to work on assignments as their deadlines approach. As a result, everyone rushes to the same office hour and consequently clog it up. They then proceed to complain about how there are never any open office hours. This is an attempt to fix this issue.
            </div>
            <div class = "panel panel-body">3) How does this work?</div>
            <div class = "panel panel-footer">
                At Save A Grade, we firmly believe that a hands-on approach is the best way to learning something new. <span class='pun'>C</span> if you can Save <span class='pun'>A</span> Grade <span class='pun'>B</span>-fore it's too late. It's <span class='pun'>E</span>-Z, requiring minimal <span class='pun'>F</span>-ort. <span class='pun'>D</span>-cide now!
            </div><!--
			<div id = "bg">
			<div id ="container">
            <span class = 'descrip formlog'>Contact Us</span><br>
            <form class = 'formlog' action='help.php' method='POST'>
                <input name='email' type='text' placeholder='Email'> <br>
				<input name = "subject" type = "text" placeholder = "Subject"> </br>
                <textarea name='description' placeholder='Description'></textarea> <br><br>
                <input type='submit'>
            </form>
			</div>
			</div>-->
		</div>
			<div id = "contact" style = "display:none">
			
			<div class = "bg"></div>
			<div class = "formcontainer">
				<div>Contact</div>
				<form id = "contactForm" action = "help.php" method = "post">
					<div><input type = "text" name = "subject" placeholder = "Subject"></div>
					<div><input type = "text" name = "email" placeholder = "Email"></div>
					<div><textarea name = "message" form = "contactForm" placeholder = "Please type your message here" cols = "38" rows = "5"></textarea></div>
					<div class = "submit" ><input type = "submit" value = "send"></div>
				</form>
			</div>
		</div>
		<div id = "contactbtn">Contact Us!</div>

    	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<!-- Include all compiled plugins (below), or include individual files as needed -->
    	<script src="js/bootstrap.min.js"></script>
    </body>
</html>