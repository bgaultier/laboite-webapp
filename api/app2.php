<?php
  $city = $apps[2]["city"];
  $filename = $city . ".json";

  if(strtolower($city) == "paris")
    $city = "zmw:00000.37.07156";
  if (!file_exists($filename) || ($now - filemtime($filename)) > 2700 ) {
	  copy("http://api.wunderground.com/api/947b3174d64aba0f/geolookup/conditions/forecast/q/$city.json", $filename);
  }

  $json_string = file_get_contents($filename);

  $parsed_json = json_decode($json_string);
  $location = $parsed_json->{'location'}->{'city'};
  $temperature = $parsed_json->{'current_observation'}->{'temp_c'};
  $icon = $parsed_json->{'current_observation'}->{'icon'};
  $temp_tomorrow_low = $parsed_json->{'forecast'}->{'simpleforecast'}->{'forecastday'}[2]->{'low'}->{'celsius'};
  $temp_tomorrow_high = $parsed_json->{'forecast'}->{'simpleforecast'}->{'forecastday'}[2]->{'high'}->{'celsius'};
  $icon_tomorrow = $parsed_json->{'forecast'}->{'simpleforecast'}->{'forecastday'}[2]->{'icon'};
  //var_dump($icon_tomorrow);

  $today = array("icon" => icon_to_number($icon),
                 "temperature" => intval($temperature));
  $tomorrow = array("icon" => icon_to_number($icon_tomorrow),
                    "low" => intval($temp_tomorrow_low),
                    "high" => intval($temp_tomorrow_high));
  $data["weather"] = array("today" => $today,
                           "tomorrow" => $tomorrow
                          );
?>
