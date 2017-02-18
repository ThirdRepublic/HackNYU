<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <title>Bootstrap Test</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link href="main.css" rel = "stylesheet">
        <link href="https://fonts.googleapis.com/css?family=ABeeZee|Open+Sans" rel="stylesheet">
    </head>
    <body>

        <!-- Fixed navbar 
        <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                    </ul>
                    </li>
                </ul>
            </div> nav-collapse
        </div>
        </nav>
-->

        <div class="top">
            <span class = "link"><a href="./index.php">Home</a></span>
            <span class = "link"><a href="./profile">Profile</a></span>
            <span class = "link"><a href="./settings">Settings</a></span>
        </div>

        <div class="container">
            <div class="well">
        	<span class = "title"><h1> Bootstrap Test </h1></span>
            <p class = "body">The quick brown fox jumped over the lazy dogs.</p>
            </div>
        </div>

        <div class = "row text-center">
            <div class="col-md-1 side">Sunday</div>
            <div class="col-md-2 center">Monday</div>
            <div class="col-md-2 center">Tuesday</div>
            <div class="col-md-2 center">Wednesday</div>
            <div class="col-md-2 center">Thursday</div>
            <div class="col-md-2 center">Friday</div>
            <div class="col-md-1 side">Saturday</div>
        </div>

    	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<!-- Include all compiled plugins (below), or include individual files as needed -->
    	<script src="js/bootstrap.min.js"></script>
    </body>
</html>