<?php
  $filename = "coffees.xml";
	if (!file_exists($filename) || ($now - filemtime($filename)) > 300 ) {
		copy("http://kfet.rsm.enstb.fr/kfet/backend/coffeesperday.php", $filename);
	}
	$xml = simplexml_load_file($filename);
	$perday = $xml->perday;
  
  $data["coffees"] = (string)$perday;
?>
