<?php
	// Waves
	$city = strtolower($apps[6]['city']);
	$filename = $city . ".html";
	if (!file_exists($filename) || ($now - filemtime($filename)) > 7200 ) {
		copy("http://www.allosurf.net/meteo-$city-surf-report-vent-186.html", $filename);
	}

	$doc = new DOMDocument();
	@$doc->loadHTMLFile($filename);

	$divs = $doc->getElementsByTagName('*');
	$i = 0;
	foreach ($divs as $div) {
		if($div->getAttribute('class') == "bghoulepat") {
			$waves[$i] = intval($div->nodeValue* 100);
			$i++;
		}
		if($i >= 8)
			break;
	}
	for($i=0; $i<sizeof($waves); $i++)
		$energy["day".$i] = ceil($waves[$i] * 7 / max($waves));

	$data["energy"] = $energy;
?>
