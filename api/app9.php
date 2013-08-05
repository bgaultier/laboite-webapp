<?php
  // IMAP + Gmail code : http://davidwalsh.name/gmail-php-imap
	
	// connect to gmail
	$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
	$username = $apps[9]['login'];
	$password = $apps[9]['password'];

	// try to connect 
	$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . print_r(imap_errors()));

	// grab unread emails
	$unread_emails = imap_search($inbox,'UNSEEN');

	// close the connection
	imap_close($inbox);
	
	$data["emails"] = count($unread_emails);
?>
