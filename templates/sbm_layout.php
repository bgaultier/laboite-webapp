<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="Baptiste Gaultier">

		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../templates/images/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../templates/images/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../templates/images/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" href="../templates/images/apple-touch-icon-57-precomposed.png">
	</head>
	<body>

	<div data-role="page">
		<div role="main" class="ui-content">
			<?php echo $content; ?>
		</div><!-- /content -->
	</div><!-- /page -->

	</body>
</html>
