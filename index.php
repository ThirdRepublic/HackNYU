<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=ABeeZee|Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>

        <title>Save-A-Grade</title>
        <style>
            body{
                background-color:#382e2e;
            }
            svg{
                margin-left:40%;
                margin-right:40%;
            }
            #top{
                background-color:#382e2e;
                position: fixed;
                top:0px;
                left:0px;
                right:0px;
                height: 55px;
                text-align: right;
                z-index:-1;
                font-size: 12pt;
            }
            #logo{
                margin-top:-10px;
            }
            text, .title{
                font-family: 'Open Sans', sans-serif;
                font-size: 12pt;
            }
            .Aplus{
                font-size: 17pt;
            }
            .center{
                margin-top:150px;
                margin-left:40%;
                margin-right:40%;
                text-align:center;
                border-radius: 10px;
                width:20%;
                padding:10px;
                background-color:white;
                color:#ff4949;
                font-family: 'Open Sans', sans-serif;
            }
            form{
                color:black;
            }
            input{
                margin:5px;
            }
            .title:hover{
                text-decoration:underline;
                text-decoration-color:#ff4949;
                cursor: pointer;
            }
            .descrip{
                color:black;
                font-size:18px;
            }
            #login{
                border-right-color:#ff4949;
                border-right-style:solid;
            }
            .error{
                font-size:18px;
                color:#ff4949;
                text-align:center;
            }
        </style>
    </head>
    <body>
        <div id = "top">
                <div id = "logo" class = "container"><?php include "logo/logo.php" ?></div>
        </div>
        <div id = "mainbody">
            <?php
            session_start();
            $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
            $error = "";
            if(isset($_SESSION["text"])){   
                $error = "<div class = 'error'>".$_SESSION['text']."</div>";
                $_SESSION["text"] = "";
            }
            if (!isset($_SESSION["email"])) {
                echo "
                    <div class = 'container center'>
                        <div class = 'row'>
                            <div id = 'login' class = 'title col-md-6'>Login</div>
                            <div id = 'register' class = 'title col-md-6'>Register</div>
                        </div>
                        <br />

                        <span class = 'descrip formlog'>Log in</span>
                        <br class = 'formlog'/><br class = 'formlog'/>
                        <form class = 'formlog' action='logIn.php' method='POST'>
                            <input name='email' type='text' placeholder='Email'> <br>
                            <input name='password' type='password' placeholder='Password'> <br><br>
                            <input type='submit'>
                        </form>
                        
                        <span class = 'descrip formreg'>Register</span>
                        <br class = 'formreg'/><br class = 'formreg'/>
                        <form class = 'formreg' action='register.php' method='POST'>
                            <input name = 'FName' placeholder = 'First Name' type = 'text' /> <br>
                            <input name = 'LName' placeholder = 'Last Name' type = 'text' /> <br>
                            <input name = 'email' placeholder = 'Email' type = 'text' /> <br>
                            <input name = 'password' type= 'password' placeholder = 'Password'/> <br>
                            <input name = 'IsStudent' value = 1 checked = 'checked' type = 'radio'> Student
                            <input name = 'IsStudent' value = 0 type = 'radio'> Professor <br><br>
                            <input type='submit'>
                        </form>
                        ".$error."</div>";
            } 
            else {
                header("Location: myclasses.php");
            }
            ?>
        </div>
        <script>
            // getting the divs for login and register to see which is active
            $(document).ready(function() {
                $(".formreg").hide();   // by default, want to log in

                // when logging in, hide register form
                $("#login").click(function() {
                    $(".formlog").show();
                    $(".formreg").hide();
                    $(".error").hide();
                });
                // when registering, hide login form
                $("#register").click(function() {
                    $(".formlog").hide();
                    $(".formreg").show();
                    $(".error").hide();
                })
            });
        </script>
    </body>
</html>