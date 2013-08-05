<?php
  /* MySQL functions */
  /* TODO those are deprecated */
  function open_database_connection() {
    $link = mysql_connect('db473297554.db.1and1.com', 'dbo473297554', '7xx1Riqb');
    mysql_select_db('db473297554', $link);
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
  
  /* Device Model */
  function get_all_user_devices($userid)
  {
    $link = open_database_connection();

    $result = mysql_query("SELECT * FROM devices WHERE creator = $userid");
    $devices = array();
    while ($row = mysql_fetch_assoc($result)) {
        $devices[] = $row;
    }
    close_database_connection($link);

    return $devices;
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
  
  function get_device_status($lastactivity)
  {
    if( (strtotime($lastactivity) + 600) >  time () )
      return "connected";
    else
      return "not-connected";
  }
  
  function update_device($id, $name, $location)
  {
    $link = open_database_connection();
    $query = "UPDATE devices SET name = '" . mysql_real_escape_string($name) . "', location = '" . mysql_real_escape_string($location) . "', lastactivity = NOW() WHERE id = ". mysql_real_escape_string($id) . " LIMIT 1";
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
    $query = "INSERT INTO user_apps (userid, appid, status, city, login, password, apikey, feedid, stop, route, direction, station) VALUES (" . mysql_real_escape_string($userid) . ", $id, '1', '', '', '', '', '', '', '', '', '')";
    $result = mysql_query($query, $link);
    
    close_database_connection($link);

    return $result;
  }
  
  function update_user_app($userid, $values)
  {
    $link = open_database_connection();

    $userid = intval($userid);
    $query = "UPDATE user_apps SET city ='" . mysql_real_escape_string($values['city']) . "', login ='" . mysql_real_escape_string($values['login']) . "', password ='" . mysql_real_escape_string($values['password']) . "', apikey ='" . mysql_real_escape_string($values['apikey']) . "', feedid ='" . mysql_real_escape_string($values['feedid']) . "', stop ='" . mysql_real_escape_string($values['stop']) . "', route ='" . mysql_real_escape_string($values['route']) . "', direction ='" . mysql_real_escape_string($values['direction']) . "', station ='" . mysql_real_escape_string($values['station']) . "' WHERE userid=$userid AND appid=" . intval($values['id']);
    $result = mysql_query($query);
    
    close_database_connection($link);

    return $result;
  }
  
  
  /* Message Model */
  function device_message_exists($deviceid)
  {
    $link = open_database_connection();

    $result = mysql_query('SELECT * FROM device_messages WHERE deviceid = ' . mysql_real_escape_string($deviceid), $link);
    
    return mysql_num_rows($result);
  }
  
  function update_device_message($deviceid, $message)
  {
    $link = open_database_connection();

    $deviceid = intval($deviceid);
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
    $query = "INSERT INTO device_messages (deviceid, message) VALUES ('$deviceid', '" . mysql_real_escape_string(iconv('UTF-8', 'ASCII//TRANSLIT', $message)) . ")";
    var_dump($query);
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

    $apikey = mysql_real_escape_string($apikey);
    $query = "SELECT message FROM device_messages WHERE deviceid = " . mysql_real_escape_string($id) ." LIMIT 1";
    $result = mysql_query($query);
    $message = mysql_fetch_assoc($result);

    close_database_connection($link);

    return $message['message'];
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
