<?php
  /* MySQL functions */
  /* TODO those are deprecated */
  function open_database_connection() {
    include "settings.php";
    $link = mysql_connect($host, $username, $password);
    mysql_select_db($database, $link);
    mysql_set_charset('utf8', $link);

    return $link;
  }

  function close_database_connection($link) {
    mysql_close($link);
  }

  /* User Model */
  function insert_new_user($email, $password) {
    $link = open_database_connection();
    $query = 'INSERT INTO users (id, email, password) VALUES (\'\', \'' . mysql_real_escape_string($email) .'\', SHA1(\'' . mysql_real_escape_string($password) . '\'))';
    $result = mysql_query($query, $link);
    close_database_connection($link);

    return $result;
  }

  function user_exists($email)
  {
    $link = open_database_connection();

    $result = mysql_query('SELECT * FROM users WHERE email = "' . mysql_real_escape_string($email) .'"', $link);
    return mysql_num_rows($result);
  }

  function user_exists_and_password_match($email, $password)
  {
    $link = open_database_connection();
    $query = 'SELECT * FROM users WHERE email = \'' . mysql_real_escape_string($email) .'\' AND password = SHA1(\'' . mysql_real_escape_string($password) . '\')';
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);

    close_database_connection($link);

    return $row;
  }

  function update_user($id, $password, $locale)
  {
    $link = open_database_connection();

    $query = "UPDATE users SET password = SHA1('" . mysql_real_escape_string($password) . "'), locale = '" . mysql_real_escape_string($locale) . "' WHERE id = $id LIMIT 1";
    $result = mysql_query($query, $link);

    close_database_connection($link);

    return $result;
  }

  function update_user_locale($id, $locale)
  {
    $link = open_database_connection();

    $query = "UPDATE users SET locale = '" . mysql_real_escape_string($locale) . "' WHERE id = $id LIMIT 1";
    $result = mysql_query($query, $link);

    close_database_connection($link);

    return $result;
  }

  /* Device Model */
  function get_all_user_devices($userid)
  {
    $link = open_database_connection();

    $result = mysql_query("SELECT * FROM devices WHERE creator = $userid");
    $devices = array();
    while ($row = mysql_fetch_assoc($result)) {
      $row["message"] = get_device_last_message($row["id"]);
      $devices[] = $row;
    }
    close_database_connection($link);

    return $devices;
  }

  function get_user_by_device_apikey($apikey)
  {
    $link = open_database_connection();

    $query = "SELECT creator FROM devices WHERE apikey = \"$apikey\" LIMIT 1";
    $result = mysql_query($query);
    $userid = mysql_fetch_assoc($result);

    close_database_connection($link);

    return $userid;
  }

  function get_device_by_id($userid, $deviceid)
  {
    $link = open_database_connection();

    $id = intval($id);
    $query = "SELECT * FROM devices WHERE creator = $userid AND id= $deviceid LIMIT 1";
    $result = mysql_query($query);
    $device = mysql_fetch_assoc($result);

    close_database_connection($link);

    return $device;
  }

  function get_device_by_apikey($apikey)
  {
    $link = open_database_connection();

    $apikey = mysql_real_escape_string($apikey);
    $query = "SELECT * FROM devices WHERE apikey = \"$apikey\" LIMIT 1";
    $result = mysql_query($query);
    $device = mysql_fetch_assoc($result);

    close_database_connection($link);

    return $device;
  }

  function get_device_speed_by_apikey($apikey)
  {
    $link = open_database_connection();

    $apikey = mysql_real_escape_string($apikey);
    $query = "SELECT speed FROM devices WHERE apikey = \"$apikey\" LIMIT 1";
    $result = mysql_query($query);
    $device = mysql_fetch_assoc($result);

    close_database_connection($link);

    return intval($device["speed"]);
  }

  function get_device_status($lastactivity)
  {
    if( (strtotime($lastactivity) + 600) >  time () )
      return "connected";
    else
      return "not-connected";
  }

  function update_device($id, $name, $location, $speed, $startsleep, $stopsleep)
  {
    $link = open_database_connection();
    $query = "UPDATE devices SET name = '" . mysql_real_escape_string($name) .
                             "', location = '" . mysql_real_escape_string($location) .
                             "', speed = " . mysql_real_escape_string($speed) .
                             ", startsleep = " . mysql_real_escape_string($startsleep) .
                             ", stopsleep = " . mysql_real_escape_string($stopsleep) .
                             " WHERE id = ". mysql_real_escape_string($id) . " LIMIT 1";
    $result = mysql_query($query, $link);
    close_database_connection($link);

    return $result;
  }

  function update_device_last_activity($apikey)
  {
    $device = get_device_by_apikey($apikey);
    $deviceid = $device['id'];

    $link = open_database_connection();
    $query = "UPDATE devices SET lastactivity = NOW() WHERE id = $deviceid LIMIT 1";
    $result = mysql_query($query, $link);
    close_database_connection($link);

    return $result;
  }

  function update_device_app($deviceid, $appid)
  {
    $link = open_database_connection();
    $query = "INSERT INTO device_apps (deviceid, appid, checked) VALUES ('$deviceid', '$appid', 1)";
    $result = mysql_query($query, $link);
    close_database_connection($link);

    return $result;
  }

  function delete_all_device_apps($deviceid)
  {
    $link = open_database_connection();
    $query = "DELETE FROM device_apps WHERE deviceid = $deviceid";
    $result = mysql_query($query, $link);
    close_database_connection($link);

    return $result;
  }

  function add_device($creator, $name, $location)
  {
    $link = open_database_connection();
    $query = "INSERT INTO devices (id, creator, name, location, apikey, lastactivity) VALUES ('', " . mysql_real_escape_string($creator) . ", '" . mysql_real_escape_string($name) . "', '" . mysql_real_escape_string($location) . "', SHA1(NOW()), NOW())";
    $result = mysql_query($query, $link);

    // insert a default message
    insert_device_message(mysql_insert_id(), "Aucun message");

    close_database_connection($link);

    return $result;
  }

  function delete_device($id)
  {
    $link = open_database_connection();
    $query = "DELETE FROM devices WHERE id = " . mysql_real_escape_string($id) ." LIMIT 1";
    $result = mysql_query($query, $link);
    close_database_connection($link);

    delete_all_device_apps($id);
    delete_all_device_messages($id);


    return $result;
  }

  function regenerate_apikey($deviceid)
  {
    $link = open_database_connection();

    $deviceid = intval($deviceid);
    $query = "UPDATE devices SET apikey = SHA1(NOW()), lastactivity = NOW() WHERE id=" . mysql_real_escape_string($deviceid);
    $result = mysql_query($query);

    close_database_connection($link);

    return $result;
  }

  /* App Model */
  function get_all_apps()
  {
    $link = open_database_connection();

    $result = mysql_query("SELECT * FROM apps");
    $apps = array();
    while ($row = mysql_fetch_assoc($result)) {
        $apps[] = $row;
    }
    close_database_connection($link);

    return $apps;
  }

  function get_user_apps($userid)
  {
    $link = open_database_connection();

    $result = mysql_query("SELECT * FROM user_apps WHERE userid =" . mysql_real_escape_string($userid));
    $apps = array();
    while ($row = mysql_fetch_assoc($result)) {
        $apps[$row["appid"]] = $row;
    }
    close_database_connection($link);

    return $apps;
  }

  function get_device_apps($deviceid)
  {
    $link = open_database_connection();

    $result = mysql_query("SELECT appid, checked FROM device_apps WHERE deviceid=" . mysql_real_escape_string($deviceid) . " AND checked=1");
    $apps = array();
    while ($row = mysql_fetch_assoc($result)) {
        $apps["app" . $row['appid']] = $row['checked'];
    }
    close_database_connection($link);

    return $apps;
  }

  function device_is_sleeping($apikey)
  {
    $device = get_device_by_apikey($apikey);

    if(is_null($device['startsleep']))
      return false;

    $sleeping = false;

    if(date('G') > $device['startsleep'] || date('G') < $device['stopsleep'])
      $sleeping = true;

    return $sleeping;
  }

  function get_device_apps_by_apikey($apikey)
  {
    $device = get_device_by_apikey($apikey);

    $link = open_database_connection();

    $apps = array();
    $devices = mysql_query("SELECT * FROM device_apps WHERE deviceid =" . $device['id']);
    while ($current_device = mysql_fetch_assoc($devices)) {
      $result = mysql_query("SELECT * FROM user_apps WHERE userid =" . $device['creator'] . " AND appid=" . $current_device['appid']);
      while ($row = mysql_fetch_assoc($result)) {
          $apps[$row["appid"]] = $row;
      }
    }
    close_database_connection($link);

    return $apps;
  }

  function get_user_app_by_id($userid, $id)
  {
    $link = open_database_connection();

    $id = intval($id);
    $query = "SELECT * FROM user_apps WHERE userid =" . mysql_real_escape_string($userid) . " AND appid=$id LIMIT 1";
    $result = mysql_query($query);
    $app = mysql_fetch_assoc($result);

    close_database_connection($link);

    return $app;
  }

  function add_user_app($userid, $id)
  {
    $link = open_database_connection();

    $id = intval($id);
    $query = "INSERT INTO user_apps (userid, appid, status, city, login, password, apikey, feedid, stop, route, direction, station1, mode1, station2, mode2, url, parking) VALUES (" . mysql_real_escape_string($userid) . ", $id, '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";
    $result = mysql_query($query, $link);

    close_database_connection($link);

    return $result;
  }

  function update_user_app($userid, $values)
  {
    $link = open_database_connection();

    $userid = intval($userid);
    $query = "UPDATE user_apps SET city ='" . mysql_real_escape_string($values['city']) .
                                         "', login ='" . mysql_real_escape_string($values['login']) .
                                         "', password ='" . mysql_real_escape_string($values['password']) .
                                         "', apikey ='" . mysql_real_escape_string($values['apikey']) .
                                         "', feedid ='" . mysql_real_escape_string($values['feedid']) .
                                         "', stop ='" . mysql_real_escape_string($values['stop']) .
                                         "', route ='" . mysql_real_escape_string($values['route']) .
                                         "', direction ='" . mysql_real_escape_string($values['direction']) .
                                         "', station ='" . mysql_real_escape_string($values['station']) .
                                         "', station1 ='" . mysql_real_escape_string($values['station1']) .
                                         "', mode1 ='" . mysql_real_escape_string($values['mode1']) .
                                         "', station2 ='" . mysql_real_escape_string($values['station2']) .
                                         "', mode2 ='" . mysql_real_escape_string($values['mode2']) .
                                         "', url ='" . mysql_real_escape_string($values['url']) .
                                         "', parking ='" . mysql_real_escape_string($values['parking']) . "' WHERE userid=$userid AND appid=" . intval($values['id']);
    $result = mysql_query($query);

    close_database_connection($link);

    return $result;
  }

  function update_sbm_apps($userid, $stop, $station, $parking)
  {
    $link = open_database_connection();

    $userid = intval($userid);
    $query = "UPDATE user_apps SET stop ='" . mysql_real_escape_string($stop) .
                               "', station ='" . mysql_real_escape_string($station) .
                               "', parking ='" . mysql_real_escape_string($parking) . "' WHERE userid=$userid";
    $result = mysql_query($query);

    close_database_connection($link);

    return $result;
  }


  /* Message Model */
  function device_message_exists($deviceid)
  {
    $link = open_database_connection();

    $result = mysql_query('SELECT * FROM device_messages WHERE deviceid = ' . mysql_real_escape_string($deviceid), $link);

    return (mysql_num_rows($result) > 0);
  }

  function update_device_message($deviceid, $message)
  {
    $link = open_database_connection();

    $deviceid = intval($deviceid);
    if(!device_message_exists($deviceid))
      insert_device_message($deviceid, "Aucun message");

    setlocale(LC_ALL, 'en_US');
    $query = "UPDATE device_messages SET message ='" . mysql_real_escape_string(iconv('UTF-8', 'ASCII//TRANSLIT', $message)) . "' WHERE deviceid=$deviceid";
    $result = mysql_query($query);

    close_database_connection($link);

    return $result;
  }

  function insert_device_message($deviceid, $message)
  {
    $link = open_database_connection();

    $deviceid = intval($deviceid);
    setlocale(LC_ALL, 'en_US');
    $query = "INSERT INTO device_messages (deviceid, message) VALUES ('$deviceid', '" . mysql_real_escape_string(iconv('UTF-8', 'ASCII//TRANSLIT', $message)) . "')";
    $result = mysql_query($query, $link);
    close_database_connection($link);

    return $result;
  }

  function delete_all_device_messages($deviceid)
  {
    $link = open_database_connection();
    $query = "DELETE FROM device_messages WHERE deviceid = $deviceid";
    $result = mysql_query($query, $link);
    close_database_connection($link);

    return $result;
  }

  function get_device_last_message($id) {
    $link = open_database_connection();

    $query = "SELECT message FROM device_messages WHERE deviceid = " . mysql_real_escape_string($id) ." LIMIT 1";
    $result = mysql_query($query);
    $message = mysql_fetch_assoc($result);

    close_database_connection($link);

    return $message['message'];
  }

  /* STAR station Model */
  function get_station_departures_by_name($name) {
    $link = open_database_connection();

    $query = "SELECT id FROM stations WHERE name LIKE \"" . mysql_real_escape_string($name) . '"';
    $result = mysql_query($query);

    $departures = array();
    while ($row = mysql_fetch_assoc($result)) {
        $url = "https://data.explore.star.fr/api/records/1.0/search?dataset=tco-bus-circulation-passages-tr&apikey=d55230a97e137bd4b073009462489f85d6486c1c242fb43db3d152a7&sort=-depart&refine.idarret=";
        $url .= $row['id'];

    	$json_string = file_get_contents($url);

        $parsed_json = json_decode($json_string);

    	$records = $parsed_json->{'records'};

    	foreach ($records as $record) {
            if(!array_key_exists($record->{'fields'}->{'destination'} , $departures)) {
                $departures[$record->{'fields'}->{'destination'}] = array('stop' => $row['id'], 'nomcourtligne' => $record->{'fields'}->{'nomcourtligne'});
            }
    	}
    }
    close_database_connection($link);

    return $departures;
  }

  /* XML model */
  function xml_encode($data) {
    $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
    $xml .= "<response>\n";
    foreach($data as $key=>$value) {
      if(is_array($value)) {
        $xml .= "\t<$key>\n";
        $xml .= array_to_xml($value);
        $xml .= "\t</$key>\n";
      }
      else
        $xml .= "\t<$key>$value</$key>\n";
    }
    $xml .= "</response>\n";

    return $xml;
  }

  function array_to_xml($data) {
    foreach($data as $key=>$value) {
      if(is_array($value)) {
        $xml .= "\t\t<$key>\n";
        $xml .= array_to_xml($value);
        $xml .= "\t\t</$key>\n";
      }
      else
        $xml .= "\t\t<$key>$value</$key>\n";
    }
    return $xml;
  }

  function icon_to_number($icon) {
		switch($icon) {
			case "clear":
			case "sunny":
			case "mostlysunny":
			case "partlysunny":
				return 0;
				break;
			case "partlycloudy":
			case "cloudy":
			case "mostlycloudy":
				return 1;
				break;
			case "chancerain":
			case "rain":
			case "mostlycloudy":
				return 2;
				break;
			case "fog":
			case "hazy":
				return 3;
				break;
			case "chanceflurries":
			case "chancesleet":
			case "chancesnow":
			case "sleet":
				return 4;
				break;
			default:
				return 1;
				break;
		}
	}

?>
