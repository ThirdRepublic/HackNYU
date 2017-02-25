<?php   
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
    if(strlen(($_POST["question"]))>500){
        $_SESSION["text"] = "Limit to 500 characters";
		header("Location: schedule.php");
    }
    else{
        echo $_SESSION['oh_date']."<br>";
        if(strlen($_POST['question'])==0){
            $question = 'NULL';
        }
        else{
            $question = $_POST['question'];
        }
        $statement = $conn->prepare("SELECT COUNT(oh_ID) FROM office_hour  WHERE oh_ID = '$_SESSION[oh_ID]'");
        $statement->execute();
        $result = $statement->fetch()[0];
        
        $statement = $conn->prepare("INSERT INTO appointment VALUES (NULL,DEFAULT,NULL,$result,'$_POST[categories]', $question, $_SESSION[oh_ID],'$_SESSION[email]', '$_SESSION[oh_date]')");
        $statement->execute();
        $statement->fetch();
        
        header("Location: schedule.php");
    }    
?>

("INSERT INTO appointment ('app_ID', 'timestamp', 'duration', 'queue', 'categories', 'question', 'oh_ID', 'email', 'oh_date') VALUES (NULL,DEFAULT,NULL,$result,'$_POST[categories]', $question, $_SESSION[oh_ID],'$_SESSION[email]', '$_SESSION[oh_date]')");


prepare("INSERT INTO test VALUES (NULL,DEFAULT,NULL,$result,'$_POST[categories]', $question, $_SESSION[oh_ID],'$_SESSION[email]', '$_SESSION[oh_date]')");