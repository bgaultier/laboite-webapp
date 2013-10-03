<?php
  // load and initialize any global libraries
  require_once '../models.php';
  
  $version = "0.1";
  $now = time();
  
  if(isset($_GET['apikey'])) {
    update_device_last_activity($_GET['apikey']);
    $apps = get_device_apps_by_apikey($_GET['apikey']);
  }
  
  $input = json_decode(file_get_contents("php://input"), true, 2);
  
  // if there is an incoming message
  if(isset($_GET['action'])) {
    if($_GET['action'] == "message" && isset($input["message"])) {
      $device = get_device_by_apikey($_GET['apikey']);
      if(isset($device) && strlen($input["message"]) < 140 ) {
        if(device_message_exists($device['id'])) {
          // clean API :)
          header(':', true, 204);
          update_device_message($device['id'], $input["message"]);
        }
        else {
          // clean API :)
          header(':', true, 201);
          insert_device_message($device['id'], $input["message"]);
        }
      }
    }
  }
	
	$data["version"] = $version;
	
	if(isset($apps[1]))
	  include_once "app1.php";
	
	if(isset($apps[3]))
	  include_once "app3.php";
	
	if(isset($apps[4]))
	  include_once "app4.php";
	
	if(isset($apps[9]))
	  include_once "app9.php";
	  
	if(isset($apps[5]))
	  include_once "app5.php";
	
	if(isset($apps[6]))
	  include_once "app6.php";
	  
	if(isset($apps[7]))
	  include_once "app7.php";
	
	if(isset($apps[8]))
	  include_once "app8.php";
	
	if(isset($apps[2]))
	  include_once "app2.php";
	
	if(isset($_GET['format'])) {
	  if($_GET['format'] == "json") {
	    header('Content-type: application/json; charset=utf-8');
	    echo json_encode($data);
	  }
	  elseif($_GET['format'] == "xml") {
	    header("Content-type: text/xml; charset=utf-8");
	    echo xml_encode($data);
	  }
	  else exit("Please specify a valid format : xml or json");
	}
	
?>
