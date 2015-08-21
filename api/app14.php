<?php
	$url = "https://data.explore.star.fr/api/records/1.0/search?dataset=tco-bus-circulation-passages-tr&rows=2&apikey=d55230a97e137bd4b073009462489f85d6486c1c242fb43db3d152a7&sort=-depart&refine.idarret=";
	$stop = str_pad($apps[14]['stop'], 4, "0", STR_PAD_LEFT);
	$url .= $stop;

	$filename = $stop . ".json";

	if (!file_exists($filename) || ($now - filemtime($filename)) > 30)
		copy($url, $filename);

	$json_string = file_get_contents($filename);

	$parsed_json = json_decode($json_string);

	$records = $parsed_json->{'records'};

	$departures = array();
	$i = 0;
	foreach ($records as $record) {
		$departures[$i]["route" . $i] = $record->{'fields'}->{'nomcourtligne'};
		$departures[$i]["departure" . $i] = str_replace('-', '<', (string)floor(((strtotime($record->{'fields'}->{'depart'}) - $now) / 60)));
		$i++;
	}
	if(isset($departures[0]) && empty($departures[1]))
		$departures[0] = $departures[1];
	if(isset($departures[0]))
		$data["stop"] = $departures;
?>
