<!DOCTYPE html>
<html>
    <head>
        <?php include "include/headerscript.php" ?>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <title>Help/FAQ</title>
        <style>
            .container{
                margin-top:100px;
                font-family: 'Open Sans', sans-serif;
            }
            .panel-body{
                color:#ff4949;
            }
            .pun{
                font-weight:bold;
                text-decoration:none;
            }
        </style>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="css/main.css" rel = "stylesheet">
        <link href="https://fonts.googleapis.com/css?family=ABeeZee|Open+Sans" rel="stylesheet">
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
                At Save A Grade, we firmly believe that a hands-on approach is the best way to learning something new. <span class='pun'>C</span> if you can Save <span class='pun'>A</span> Grade <span class='pun'>B</span>-fore it's too late. It's <span class='pun'>E</span>-Z, requiring minimal <span class='pun'">F</span>-ort. <span class='pun'>D</span>-cide now!
            </div>

            <span class = 'descrip formlog'>Contact Us</span><br>
            <form class = 'formlog' action='logIn.php' method='POST'>
                <input name='email' type='text' placeholder='Email'> <br>
                <input name='description' type='input' placeholder='Description'> <br><br>
                <input type='submit'>
            </form>
        </div>

    	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<!-- Include all compiled plugins (below), or include individual files as needed -->
    	<script src="js/bootstrap.min.js"></script>
    </body>
</html>