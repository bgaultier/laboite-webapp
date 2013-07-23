<?php
  // Waves
  $city = strtolower($apps[6]['city']);
  $filename = $city . ".html";
	if (!file_exists($filename) || ($now - filemtime($filename)) > 7200 ) {
		copy("http://www.allosurf.net/meteo-$city-port-blanc-surf-report-vent-premium-57.html", $filename);
	}
	
	$doc = new DOMDocument();
	@$doc->loadHTMLFile($filename);
	
	$divs = $doc->getElementsByTagName('*');
	$i = 0;
	foreach ($divs as $div) {
		if($div->getAttribute('class') == "bghoulepat") {
			$waves["wave".$i] = intval($div->nodeValue* 100);
			$i++;
		}
		if($i >= 8)
			break;
  }
  
	$data["waves"] = $waves;
?>
