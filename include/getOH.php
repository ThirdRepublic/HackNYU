<?php
include "include/headerscript.php";

if (is_ajax()) {
  if (isset($_POST["classSelect"]) && !empty($_POST["classSelect"])) { //Checks if action value exists
    $action = $_POST["classSelect"];
    switch($action) { //Switch case for value of action
      case "test": test_function(); break;
    }
  }
}

//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}


$cmd = "SELECT b.class_ID AS classID, b.isEnrolled as isEnrolled, c.name AS className FROM users u INNER JOIN bookmarked b ON u.email = b.email INNER JOIN classes c ON b.class_ID = c.class_ID WHERE email= '$_SESSION[email]'";
$statement = $conn->prepare($cmd);
$statement->execute();
$return = array();
while($result = $statement->fetch_assoc()){
	echo "<div id = ".$result['classID']." class = ".$result['isEnrolled'].">";
	echo $result["className"];
	echo "</div>";
}
function test_function(){
	$cmd = "SELECT oh_ID, class_ID, time_ID, location FROM office_hour WHERE class_ID = $_POST['classSelect']";
	$statement = $conn->prepare($cmd);
	$statement->execute();
	$return = array();
	while($result = $statement->fetch_assoc()){
		$return[] = array('OHID'=>$result['oh_ID'], "time"=>$result['time_Begin'], "location"=>$result['location']);
	}
  //Do what you need to do with the info. The following are some examples.
  //if ($return["favorite_beverage"] == ""){
  //  $return["favorite_beverage"] = "Coke";
  //}
  //$return["favorite_restaurant"] = "McDonald's";

  $return["json"] = json_encode($return);
  echo json_encode($return);
}
?>