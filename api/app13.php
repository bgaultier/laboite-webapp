<?php
	$filename = "metro.json";

	if (!file_exists($filename) || ($now - filemtime($filename)) > 5*60 ) {
		copy("https://data.explore.star.fr/api/records/1.0/search?dataset=tco-metro-lignes-etat-tr&facet=nomcourt&apikey=d55230a97e137bd4b073009462489f85d6486c1c242fb43db3d152a7", $filename);
	}

	$json_string = file_get_contents($filename);

	$parsed_json = json_decode($json_string);

	$metro = array();
	$metro['failure'] = $parsed_json->{'records'}[0]->{'fields'}->{'etat'} != "OK";
	if($metro['failure'])
		$metro['end'] = $parsed_json->{'records'}[0]->{'fields'}->{'finpanneprevue'};

	$data["metro"] = $metro;
?>
