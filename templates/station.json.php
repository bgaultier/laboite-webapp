<?php
	header('Cache-Control: no-cache, must-revalidate');
	header('Content-type: application/json');

	echo json_encode($departures);
?>
