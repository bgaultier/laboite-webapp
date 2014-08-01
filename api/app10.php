<?php
	if(isset($apps[10]['station1']) &&  isset($apps[10]['station2'])) {
		$station1 = str_replace(' ', '+', $apps[10]['station1']);
		$station2 = str_replace(' ', '+', $apps[10]['station2']);
		
		$url = "http://ratp-bridge.fabernovel.com/ratp.itinerary.search?type1=station&type2=station&name1=$station1&name2=$station2&reseau=tout&traveltype=minimum_de_changement&datestart=true&datehour=";
		$url .= date('H');
		$url .= "&dateminute=";
		$url .= date('i');
		$response = simplexml_load_file($url);
		$next_departure = $response->itinerary->stages->stage[1]->start_time;
		
		$data["bus"] = (string)floor(((strtotime($next_departure) - $now) / 60));
	}
?>
