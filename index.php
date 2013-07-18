<?php
  /*
    laboîte-webapp v0.1 is a PHP+MySQL web application that allows the
    remote configuration of devices connected to Internet.
    
    Copyright (C) 2013  Baptiste Gaultier

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
  */

  // start new or resume existing session
  session_start();
  
  // load and initialize any global libraries
  require_once 'models.php';
  require_once 'controllers.php';
  
  // internationalization
  if(isset($_SESSION['locale']))
    $language = $_SESSION['locale'];
  else {
    $language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $language = $language . '_' . strtoupper($language);
  }
  putenv("LANG=$language");
  setlocale(LC_ALL, $language);
  $domain = 'messages';
  bindtextdomain($domain, "./templates/locale");
  textdomain($domain);

  // route the request internally
  $uri = $_SERVER['REQUEST_URI'];

  if ('/' == $uri)
    list_devices_action($_SESSION['id']);
  elseif ('/devices' == $uri)
    list_devices_action($_SESSION['id']);
  elseif ('/login' == $uri)
    login_action();
  elseif ('/logout' == $uri)
    logout_action();
  elseif ('/signup' == $uri)
    signup_action();
  elseif ('/account' == $uri)
    account_action($_SESSION['email']);
  elseif ('/help' == $uri)
    help_action();
  elseif ('/about' == $uri)
    about_action();
  elseif ('/device.json' == substr($uri, 0, 12) && isset($_GET['id'])) {
    header('Content-type: application/json');
    get_device_action($_SESSION['id'], $_GET['id']);
  }
  elseif ('/add' == substr($uri, 0, 4)) {
    add_device_action($_SESSION['id']);
    list_devices_action($_SESSION['id']);
  }
  elseif ('/delete' == substr($uri, 0, 7) && isset($_GET['id'])) {
    delete_device_action($_SESSION['id'], $_GET['id']);
    list_devices_action($_SESSION['id']);
  }
  elseif ('/regenerate' == substr($uri, 0, 11) && isset($_GET['id']))
    regenerate_device_apikey_action($_SESSION['id'], $_GET['id']);
  elseif ('/apps' == $uri)
    list_apps_action($_SESSION['id']);
  elseif ('/apps.json' == $uri) {
    header('Content-type: application/json');
    list_apps_json_action($_SESSION['id']);
  }
  elseif ('/app.json' == substr($uri, 0, 9) && isset($_GET['id'])) {
    header('Content-type: application/json');
    get_user_app_action($_SESSION['id'], $_GET['id']);
  }
  else
    login_action();

?>
