<?php
	$parking = $apps[12]["parking"];
	$filename = $parking . ".json";

	if (!file_exists($filename) || ($now - filemtime($filename)) > 350 ) {
		copy("https://data.explore.star.fr/api/records/1.0/search?dataset=tco-parcsrelais-etat-tr&sort=idparc&facet=nom&facet=etat", $filename);
	}

	$json_string = file_get_contents($filename);

	$parsed_json = json_decode($json_string);

	$HFR = array();
	$HFR['spaces'] = $parsed_json->{'records'}[0]->{'fields'}->{'nombreplacesdisponibles'};
	$HFR['open'] = $parsed_json->{'records'}[0]->{'fields'}->{'etat'} == "Ouvert";

	$JFK = array();
	$JFK['spaces'] = $parsed_json->{'records'}[1]->{'fields'}->{'nombreplacesdisponibles'};
	$JFK['open'] = $parsed_json->{'records'}[1]->{'fields'}->{'etat'} == "Ouvert";

	$POT = array();
	$POT['spaces'] = $parsed_json->{'records'}[2]->{'fields'}->{'nombreplacesdisponibles'};
	$POT['open'] = $parsed_json->{'records'}[2]->{'fields'}->{'etat'} == "Ouvert";

	$VU = array();
	$VU['spaces'] = $parsed_json->{'records'}[3]->{'fields'}->{'nombreplacesdisponibles'};
	$VU['open'] = $parsed_json->{'records'}[3]->{'fields'}->{'etat'} == "Ouvert";

	switch ($parking) {
		case "HFR":
			$data["parking"] = $HFR;
			break;
		case "JFK":
			$data["parking"] = $JFK;
			break;
		case "POT":
			$data["parking"] = $POT;
			break;
		case "VU":
			$data["parking"] = $VU;
			break;
		default:
			$data["parking"] = $HFR;
	}

?>
