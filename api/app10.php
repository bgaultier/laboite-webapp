<?php
	if(isset($apps[10]['station1']) &&  isset($apps[10]['station2'])) {
		$station1 = str_replace(' ', '+', $apps[10]['station1']);
		$mode1 = $apps[10]['mode1'];
		$station2 = str_replace(' ', '+', $apps[10]['station2']);
		$mode2 = $apps[10]['mode2'];

		$url = "http://www.ratp.fr/itineraires/fr/ratp/resultat-detaille/start/$station1+($mode1)%2C+Paris/end/$station2+($mode2)%2C+Paris/";

		if($_GET['apikey'] == "3f42495f")
			$url = "http://www.ratp.fr/itineraires/fr/ratp/resultat-detaille/start/$station1+($mode1)%2C+Puteaux/end/$station2+($mode2)%2C+Paris/";

		if($_GET['apikey'] == "75417b12")
			$url = "http://www.ratp.fr/itineraires/fr/ratp/recherche-avancee?start=Jules+Joffrin+%28METRO%29%2C+Paris&end=Place+de+Clichy%2C+75018%2C+Paris";

		$doc = new DOMDocument();
		@$doc->loadHTMLFile($url);

		$nodes = $doc->getElementsByTagName('dd');
		$timeString = explode("h", (string)$nodes->item(0)->nodeValue);
		$next_departure = mktime((int)$timeString[0], (int)$timeString[1], 0, date("m")  , date("d"), date("Y"));

		$data["bus"] = (string)floor((($next_departure - $now-3600) / 60));
	}
?>
