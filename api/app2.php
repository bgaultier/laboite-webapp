<?php
  $city = $apps[2]["city"];
  $filename = $city . ".json";
  if (!file_exists($filename) || ($now - filemtime($filename)) > 1800 ) {
	  copy("http://api.wunderground.com/api/947b3174d64aba0f/geolookup/conditions/forecast/q/$city.json", $filename);
  }

  $json_string = file_get_contents($filename);

  $parsed_json = json_decode($json_string);
  $location = $parsed_json->{'location'}->{'city'};
  $temperature = $parsed_json->{'current_observation'}->{'temp_c'};
  $icon = $parsed_json->{'current_observation'}->{'icon'};
  $icon_tomorrow = $parsed_json->{'forecast'}->{'simpleforecast'};
  $temp_tomorrow_low = $parsed_json->{'forecast'}->{'simpleforecast'}->{'forecastday'}[2]->{'low'}->{'celsius'};
  $temp_tomorrow_high = $parsed_json->{'forecast'}->{'simpleforecast'}->{'forecastday'}[2]->{'high'}->{'celsius'};
  $icon_tomorrow = $parsed_json->{'forecast'}->{'simpleforecast'}->{'forecastday'}[2]->{'icon'};
  
  $data["weather"] = array("today" => icon_to_number($icon),
                           "temperature" => $temperature,
                           "tomorrow" => icon_to_number($icon_tomorrow),
                           "low" => $temp_tomorrow_low,
                           "high" => $temp_tomorrow_high
                          );
?>
