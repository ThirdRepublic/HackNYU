<?php
session_start();
    $conn = new PDO("mysql:host=localhost;dbname=hacknyu", "root", "");
/*
if (is_ajax()) {
  if (isset($_POST["select"]) && !empty($_POST["select"])) { //Checks if action value exists
    $action = $_POST["select"];
    switch($action) { //Switch case for value of action
      case "test": test_function(); break;
    }
  }
}

//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function test_function(){*/
	$cmd = "SELECT o.oh_ID AS OHID, o.class_ID AS classID, o.time_Begin AS time, o.location AS room, o.weekDay AS weekDay, c.Start AS startDate, c.End AS endDate FROM office_hour o INNER JOIN classes c ON c.class_ID = o.class_ID WHERE o.class_ID = ".$_POST['select'];
	$statement = $conn->prepare($cmd);
	$statement->execute();
	$return = array();
	while($result = $statement->fetch()){
		$return[] = array('OHID'=>$result['OHID'], "time"=>$result['time'], "location"=>$result['room'], "weekday"=>$result['weekDay'], "startDate"=>$result['startDate'], "endDate"=>$result['endDate']);
    //echo $result['oh_ID'].$result['time_Begin'].$result['location'];
	}
  //Do what you need to do with the info. The following are some examples.
  //if ($return["favorite_beverage"] == ""){
  //  $return["favorite_beverage"] = "Coke";
  //}
  //$return["favorite_restaurant"] = "McDonald's";

  //$return["json"] = json_encode($return);
  echo json_encode($return);
//}
?>