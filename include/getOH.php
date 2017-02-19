<?php
include "headerscript.php";
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
	$cmd = "SELECT oh_ID, class_ID, time_Begin, location FROM office_hour WHERE class_ID = ".$_POST['select'];
	$statement = $conn->prepare($cmd);
	$statement->execute();
	$return = array();
	while($result = $statement->fetch()){
		$return[] = array('OHID'=>$result['oh_ID'], "time"=>$result['time_Begin'], "location"=>$result['location']);
    //echo $result['oh_ID'].$result['time_Begin'].$result['location'];
	}
  //Do what you need to do with the info. The following are some examples.
  //if ($return["favorite_beverage"] == ""){
  //  $return["favorite_beverage"] = "Coke";
  //}
  //$return["favorite_restaurant"] = "McDonald's";

  $return["json"] = json_encode($return);
  echo json_encode($return);
//}
?>