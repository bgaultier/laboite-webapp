<?php
  $device = get_device_by_apikey($_GET['apikey']);
  $data["messages"] = get_device_last_message($device['id']);
?>
