<?php
  $filename = "dashboard.json";
  if (!file_exists($filename) || ($now - filemtime($filename)) > 60 ) {
	  copy("http://laclef.cc/dashboard.json", $filename);
  }

	$json_string = file_get_contents($filename);
	$parsed_json = json_decode($json_string);
	
	$data["coffees"] = (string)$parsed_json->coffees_today;
?>
