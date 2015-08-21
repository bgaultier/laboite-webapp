<?php
	// load and initialize any global libraries
  require_once '../models.php';
	require 'iCalReader.php';

	$url = strtolower($apps[11]['url']);
	$user = get_user_by_device_apikey($_GET['apikey']);
	$filename = $user['creator'] . ".ics";

	if ($userid && !file_exists($filename) || ($now - filemtime($filename)) > 3600 ) {
		copy($url, $filename);
	}

	$ical = new ICal($filename);
	$start = new DateTime('@' . strtotime('00:01:00'));
	$end = new DateTime('@' . strtotime('23:59:00'));
	$events = $ical -> eventsFromRange($start->format('Y-m-d H:i:s'), $end->format('Y-m-d H:i:s'));

	for ($i = 0; $i < count($events); $i++)
	{
		$current_event = array();
		$current_event["dtstart"] = date('Hi', $ical->iCalDateToUnixTimestamp($events[$i]['DTSTART']) + 7200);
		setlocale(LC_ALL, 'en_US');
		$current_event["summary"] = iconv('UTF-8', 'ASCII//TRANSLIT', $events[$i]['SUMMARY']);

		$data["event"] = $current_event;
		if (time() < ($ical->iCalDateToUnixTimestamp($events[$i]['DTSTART']) + 3600))
			break;
	}
?>
