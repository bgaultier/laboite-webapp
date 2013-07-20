<?php
  // load and initialize any global libraries
  require_once '../models.php';
  
  $version = "0.1";
  $now = time();
  
  if(isset($_GET['apikey'])) {
    update_device_last_activity($_GET['apikey']);
    $apps = get_device_apps_by_apikey($_GET['apikey']);
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
	
	if(isset($apps[2]))
	  include_once "app2.php";
	
	if(isset($_GET['format'])) {
	  if($_GET['format'] == "json") {
	    header('Content-type: application/json');
	    echo json_encode($data);
	  }
	  else {
	    header("Content-type: text/xml");
	    echo xml_encode($data);
	  }
	}
	else exit("Please specify a valid format : xml or json");
	
?>
