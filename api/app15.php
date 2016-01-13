<?php
	$filename = "twitter.json";
	if (!file_exists($filename) || ($now - filemtime($filename)) > 5*60 ) {
		include_once('TwitterAPIExchange.php');

	   $settings = array(
	                  'oauth_access_token' => "",
	                  'oauth_access_token_secret' => "",
	                  'consumer_key' => "",
	                  'consumer_secret' => ""
	   );

	   $url = "https://api.twitter.com/1.1/search/tweets.json";
	   $requestMethod = 'GET';

	   $twitter = new TwitterAPIExchange($settings);
	   $getfield = '?q=%23InfoTrafic %23Rennes&count=1&result_type=recent';
		file_put_contents($filename, $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest());
	}
	$json_string = file_get_contents($filename);

	$parsed_json = json_decode($json_string);
   $status = $parsed_json->{'statuses'}[0]->{'text'};

	if(isset($status))
      $data["messages"] = clean_tweet($status);

   function clean_tweet($tweet) {
		setlocale(LC_ALL, 'en_US');
		$tweet = iconv('UTF-8', 'ASCII//TRANSLIT', $tweet);
		$tweet = str_replace(',', "", $tweet);
		$tweet = str_replace('#Rennes', "", $tweet);
      $tweet = str_replace('#infotrafic', "", $tweet);
      $tweet = str_replace('#Infotrafic', "", $tweet);
      $tweet = preg_replace("@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?).*$)@", '', $tweet);
		return $tweet;
	}
?>
