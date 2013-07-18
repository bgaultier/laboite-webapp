<?php
  if(!isset($_SESSION['id'])) {
    // Redirect browser
    header("Location: http://" . $_SERVER['SERVER_NAME'] . "/login");
    // Make sure that code below does not get executed when we redirect
    exit;
  }
?>

<?php
	header('Cache-Control: no-cache, must-revalidate');
	header('Content-type: application/json');	
	
	echo json_encode($app);
?>
