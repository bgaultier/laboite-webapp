<?php
  function login_action() {
  $user = user_exists_and_password_match($_POST['email'], $_POST['password']);
    if($user && !empty($_POST['email'])) {
    $_SESSION['id'] = $user['id'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['locale'] = $user['locale'];

      list_devices_action($_SESSION['id']);
    }
    else
      require 'templates/login.php';
  }

  function logout_action() {
    require 'templates/logout.php';
  }

  function signup_action() {
    require 'templates/signup.php';
  }

  function account_action($email) {
  // dealing with user configuration form
    $user_modified = user_exists_and_password_match($email, $_POST['oldpassword']);
    if($user_modified && !empty($_POST['password'])) {
      update_user($user_modified['id'], $_POST['password'], $_POST['locale']);
      $_SESSION['locale'] = $_POST['locale'];
    }
    elseif($user_modified && !empty($_POST['locale'])) {
      update_user_locale($user_modified['id'], $_POST['locale']);
      $_SESSION['locale'] = $_POST['locale'];
    }
    require 'templates/account.php';
  }

  function help_action() {
    // get all the apps descriptions
    $apps = get_all_apps();

    require 'templates/help.php';
  }

  function guide_action() {
    require 'templates/guide.php';
  }

  function thanks_action() {
  require 'templates/thanks.php';
  }

  function about_action() {
    require 'templates/about.php';
  }

  function makerfaire_action() {
  if(isset($_POST["message"]) && strlen($_POST["message"]) < 140 )
      update_device_message(1, $_POST["message"]);

    require 'templates/makerfaire.php';
  }

  function list_devices_action($userid) {
    // dealing with device configuration form
    $device_modified = get_device_by_id($userid, $_POST['id']);
    if($device_modified && isset($_POST['name'])) {
      $update_message = true;
      update_device($_POST['id'], $_POST['name'], $_POST['location'], $_POST['speed'], $_POST['startsleep'], $_POST['stopsleep']);
      delete_all_device_apps($_POST['id']);
      foreach ($_POST as $key=>$value) {
        if (strpos($key,'app') !== false)
          update_device_app($_POST['id'], substr($key, 3, strlen($key)));
      }
    }
    // dealing with message form
    if($device_modified && isset($_POST['message']))
      update_device_message($_POST['id'], $_POST['message']);
    // then list all the user devices
    $devices = get_all_user_devices($userid);
    $apps = get_all_apps();

    require 'templates/devices.php';
  }

  function get_device_action($userid, $deviceid) {
    $device = get_device_by_id($userid, $deviceid);
    $device_apps = get_device_apps($deviceid);
    $device['apps'] = $device_apps;

    require 'templates/device.json.php';
  }

  function add_device_action($userid) {
    add_device($userid, $_POST['name'], $_POST['location']);
  }

  function delete_device_action($userid, $deviceid) {
    $device = get_device_by_id($userid, $deviceid);
    if(isset($device))
      delete_device($device['id']);
    else
      die;
  }

  function regenerate_device_apikey_action($userid, $deviceid) {
    $device = get_device_by_id($userid, $deviceid);
    if(isset($device)) {
      regenerate_apikey($device['id']);
      list_devices_action($userid);
    }
    else die;
  }

  function list_apps_action($userid) {
    // dealing with device configuration form
    $app_modified = get_user_app_by_id($userid, $_POST['id']);
    if($app_modified)
      update_user_app($userid, $_POST);
    else {
      if($_POST['id'])
        add_user_app($userid, $_POST);
    }
    // then list all the user devices
    $apps = get_all_apps();
    $user_apps = get_user_apps($userid);
    require 'templates/apps.php';
  }

  function list_apps_json_action($userid) {
    $apps = get_all_apps();
    require 'templates/apps.json.php';
  }

  function get_user_app_action($userid, $appid) {
    $app = get_user_app_by_id($userid, $appid);
    if($app == false) {
      add_user_app($userid, $appid);
      $app = get_user_app_by_id($userid, $appid);
    }
    require 'templates/app.json.php';
  }

  function sbm_action($apikey) {
    $device = get_device_by_apikey($apikey);

    if($device && isset($_GET['reset'])) {
        reset_sbm_stop($device['creator']);
        // we do not want to update sbm apps
        unset($_POST['name']);
    }

    if($device && isset($_POST['name'])) {
      $update_message = true;
      update_device($_POST['id'], $_POST['name'], $_POST['location'], $_POST['speed'], $_POST['startsleep'], $_POST['stopsleep']);
      delete_all_device_apps($_POST['id']);
      foreach ($_POST as $key=>$value) {
        if (strpos($key,'app') !== false)
          update_device_app($_POST['id'], substr($key, 3, strlen($key)));
      }
      if($_POST['parking'])
        update_sbm_apps($device['creator'], $_POST['stop'], $_POST['station'], $_POST['parking']);

      $device = get_device_by_apikey($apikey);
    }
    $apps = get_all_apps();
    $device_apps = get_device_apps($device['id']);
    $station = intval(get_user_app_by_id($device['creator'], 4)['station']);
    $parking = get_user_app_by_id($device['creator'], 12)['parking'];
    $stop = get_user_app_by_id($device['creator'], 14)['stop'];

    if(is_null($stop))
        $stop_is_set = false;
    else {
        $stop_is_set = true;
        $stop_name = get_stop_name_by_id($stop);
    }


    require 'templates/sbm.php';
  }

  function find_station_action($name) {
    $departures = get_station_departures_by_name(urldecode($name));

    require 'templates/station.json.php';
  }
?>
