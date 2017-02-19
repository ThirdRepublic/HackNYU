<?php
    session_start();
    $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
    $statement = $conn->prepare("SELECT email, question, categories 
                                FROM
                                (SELECT bookmarked.email, bookmarked.class_ID FROM class_ta INNER JOIN bookmarked
                                ON class_ta.class_ID = bookmarked.class_ID WHERE class_ta.email = '$_SESSION[email]') as a
                                INNER JOIN
                                (SELECT class_ID, question, categories FROM office_hour INNER JOIN appointment 
                                ON office_hour.oh_ID = appointment.oh_ID) as b
                                ON a.class_ID = b. class_ID");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $result => $case){
        echo "Name: ".$case[0]." <br>
        Purpose of visit: ".$case[1]." <br>
        Catorgory: ".$case[2]." <br> <br>";
    }
?>    

