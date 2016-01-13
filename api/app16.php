<?php
	// URL to get information about a bike station (STAR API)
	$url = "https://data.explore.star.fr/api/records/1.0/search/?dataset=vls-stations-etat-tr&sort=idstation&facet=nom&facet=etat&facet=nombreemplacementsactuels&facet=nombreemplacementsdisponibles&facet=nombrevelosdisponibles&apikey=d55230a97e137bd4b073009462489f85d6486c1c242fb43db3d152a7&refine.nom=";
	// Here is the name of our station
	$name = "Place+de+Bretagne";
	$url .= $name;

	// GET the json file coming from STAR API
	$json_string = file_get_contents($url);

	// Parse the JSON
	$parsed_json = json_decode($json_string);

	// Path of the ressource
	$records = $parsed_json->{'records'}[0]->{'fields'};

	// Extract the information
	$bikes_available = $records->{'nombrevelosdisponibles'};

	if(isset($bikes_available))
		$data["bikes"] = (int)$bikes_available;

	// echo the info
	echo "Rides available at Place de Bretagne station : $bikes_available\n";
?>
