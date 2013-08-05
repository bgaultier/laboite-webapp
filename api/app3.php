<?php
  $url = "http://data.keolis-rennes.com/xml/?cmd=getbusnextdepartures&version=2.1&key=HWXEIBF8HJPVPHE&param[mode]=stopline&param[route][]=";
  $url .= $apps[3]['route'];
  $url .= "&param[direction][]=";
  $url .= $apps[3]['direction'];
  $url .= "&param[stop][]=";
  $url .= $apps[3]['stop'];
  $response = simplexml_load_file($url);
  $next_departure = $response->answer->data->stopline->departures->departure[0];
  
  $data["bus"] = (string)floor(((strtotime($next_departure) - $now) / 60));
?>
