<?php
  $opts = array(
		'http'=>array(
		  'method'=>"GET",
		  'header'=>"Host: baptistegaultier.fr"
		)
  );
  $last_week = ($now - (7 * 24 * 3600)) * 1000;

	$context = stream_context_create($opts);
	
	$apikey = $apps[5]['apikey'];
	
	$url = "http://localhost/emoncms/feed/data.json?id=2&start=$last_week&apikey=$apikey";

	$json_string = file_get_contents($url, false, $context);
	$parsed_json = json_decode($json_string);
	$consumption_history = array();
	for($i = (sizeof($parsed_json) - 1); $i>=0; $i--)
		$consumption_history[] = $parsed_json[$i][1];
  for($i=0; $i<sizeof($consumption_history); $i++)
		$energy["day".$i] = ceil($consumption_history[$i] * 7 / max($consumption_history));
  
  $data["energy"] = $energy;
  
?>
