<?php
	$station1 ="Insa";

	$json_string = file_get_contents("http://m.starbusmetro.fr/?q=rennes_gtfs_poisuggestions/$station1");

	$parsed_json = json_decode($json_string);

	var_dump($parsed_json);

	$stops = array();
?>
