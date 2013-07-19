-- laboite-webapp SQL Dump
-- version 0.1
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `apps`
-- 

CREATE TABLE IF NOT EXISTS apps (
  id int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  description varchar(255) DEFAULT NULL,
  city_needed tinyint(1) NOT NULL DEFAULT '0',
  login_needed tinyint(1) NOT NULL DEFAULT '0',
  password_needed tinyint(1) NOT NULL DEFAULT '0',
  apikey_needed tinyint(1) NOT NULL DEFAULT '0',
  feedid_needed tinyint(1) NOT NULL DEFAULT '0',
  stop_needed tinyint(1) NOT NULL DEFAULT '0',
  route_needed tinyint(1) NOT NULL DEFAULT '0',
  direction_needed tinyint(1) NOT NULL DEFAULT '0',
  station_needed tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- 
-- Contenu de la table `apps`
-- 

INSERT INTO apps VALUES (1, 'Time', 'Shows the clock time', 1, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO apps VALUES (2, 'Weather', 'Displays the weather forecast based on data received from wunderground.com', 1, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO apps VALUES (3, 'Buses', 'Displays the number of minutes you have to wait for the next bus at your stop (data.keolis-rennes.com)', 0, 0, 0, 0, 0, 1, 1, 1, 0);
INSERT INTO apps VALUES (4, 'Bikes', 'Displays the number of bikes available at your bike station (data.keolis-rennes.com)', 0, 0, 0, 0, 0, 0, 0, 0, 1);
INSERT INTO apps VALUES (5, 'Energy', 'Displays the energy consumption history chart of an emoncms.org feed', 0, 0, 0, 1, 0, 0, 0, 0, 0);
INSERT INTO apps VALUES (6, 'Waves', 'Displays the predicted quality and conditions of a surf spot', 1, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO apps VALUES (7, 'Messages', 'Displays messages sent by your friends', 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO apps VALUES (8, 'Coffees', 'Displays your daily coffee consumption', 0, 0, 0, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Structure de la table `device_apps`
-- 

CREATE TABLE IF NOT EXISTS device_apps (
  deviceid int(11) NOT NULL,
  appid int(11) NOT NULL,
  checked tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (deviceid,appid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Structure de la table `devices`
-- 

CREATE TABLE IF NOT EXISTS devices (
  id int(11) NOT NULL AUTO_INCREMENT,
  creator int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  location varchar(128) NOT NULL,
  apikey varchar(8) NOT NULL,
  lastactivity timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Structure de la table `user_apps`
-- 

CREATE TABLE IF NOT EXISTS user_apps (
  userid int(11) NOT NULL,
  appid int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  city varchar(64) DEFAULT NULL,
  login varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  apikey varchar(64) DEFAULT NULL,
  feedid int(11) DEFAULT NULL,
  `stop` char(4) DEFAULT NULL,
  route char(4) DEFAULT NULL,
  direction tinyint(1) DEFAULT NULL,
  station char(4) DEFAULT NULL,
  PRIMARY KEY (userid,appid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Structure de la table `users`
-- 

CREATE TABLE IF NOT EXISTS users (
  id int(11) NOT NULL AUTO_INCREMENT,
  email varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  locale char(5) DEFAULT 'en_US',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
