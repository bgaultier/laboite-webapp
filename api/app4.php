<?php
  $url = "http://data.keolis-rennes.com/xml/?version=2.0&key=HWXEIBF8HJPVPHE&cmd=getbikestations&param[station]=number&param[value]=";
  $url .= $apps[3]['station'];
  $response = simplexml_load_file($url);
  $bikes_available = $response->answer->data->station->bikesavailable;
  
  $data["bikesavailable"] = (string)$bikes_available;
?>
