<?php   
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
    if(strlen(($_POST["question"]))>500){
        $_SESSION["text"] = "Limit to 500 characters";
		header("Location: schedule.php");
    }
    else{
        $statement = $conn->prepare("COUNT('$_SESSION[oh_ID]') FROM office_hour");
        $statement->execute();
        $result = $statement->fetch();
        $result +=1;
        $statement = $conn->prepare("INSERT INTO appointment VALUES (NULL,DEFAULT,NULL,$result,'$_POST[categories]','$_POST[question]',$_SESSION[oh_ID], '$_SESSION[email]', '$_SESSION[oh_Date])'");
        $statement->execute();
        header("Location: schedule.php");
    }    
?>
