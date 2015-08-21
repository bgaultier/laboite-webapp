<?php
  $url = "http://data.keolis-rennes.com/xml/?cmd=getbusnextdepartures&version=2.1&key=HWXEIBF8HJPVPHE&param[mode]=stopline&param[route][]=";
  $url .= str_pad($apps[3]['route'], 4, "0", STR_PAD_LEFT);
  $url .= "&param[direction][]=";
  $url .= $apps[3]['direction'];
  $url .= "&param[stop][]=";
  $url .= $apps[3]['stop'];
  $response = simplexml_load_file($url);
  $next_departure = $response->answer->data->stopline->departures->departure[0];

  $next_departure = floor(((strtotime($next_departure) - $now) / 60));

  if ($next_departure > -2)
    $data["bus"] = str_replace ('-', '<', (string)$next_departure);
?>
