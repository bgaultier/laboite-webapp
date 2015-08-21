<?php
	// load and initialize any global libraries
	require_once '../models.php';

	$version = "0.5";
	$data["version"] = $version;
	$now = time();

	// default speed is medium : 50ms
	$speed = 50;

	if(isset($_GET['apikey'])) {
		update_device_last_activity($_GET['apikey']);

		$speed = get_device_speed_by_apikey($_GET['apikey']);
		if(device_is_sleeping($_GET['apikey']))
			$data["sleeping"] = true;
		else {
			$data["speed"] = $speed;
			$apps = get_device_apps_by_apikey($_GET['apikey']);
		}
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

	 if(isset($apps[15]))
			include_once "app15.php";

	if(isset($apps[8]))
		include_once "app8.php";

	if(isset($apps[2]))
		include_once "app2.php";

	if(isset($apps[10]))
		include_once "app10.php";

	if(isset($apps[11]))
		include_once "app11.php";

	 if(isset($apps[12]))
			include_once "app12.php";

	 if(isset($apps[13]))
			include_once "app13.php";

	 if(isset($apps[14]))
		 include_once "app14.php";

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
