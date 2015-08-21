<?php
	$filename = "twitter.html";
	if (!file_exists($filename) || ($now - filemtime($filename)) > 5*60 )
		copy("http://m.starbusmetro.fr/tweets/lignes", $filename);

	$doc = new DOMDocument();
	@$doc->loadHTMLFile($filename);

	$tweets = $doc->getElementById('tweets')->childNodes;
	foreach ($tweets as $tweet) {
		setlocale(LC_ALL, 'en_US');
		$data["messages"] = clean_tweet($tweet->nodeValue);
		break;
	}

	function clean_tweet($tweet) {
		setlocale(LC_ALL, 'en_US');
		$tweet = iconv('UTF-8', 'ASCII//TRANSLIT', $tweet);
		$tweet = strstr($tweet, "Ligne");
		$tweet = str_replace("starbusmetro (@starbusmetro) ", "", $tweet);
		$tweet = str_replace(',', "", $tweet);
		return $tweet;
	}
?>
