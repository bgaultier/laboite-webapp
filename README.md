laboite-webapp
==============

This is a PHP+MySQL web application that allows the remote configuration of [laboîte devices](https://github.com/bgaultier/laboite) connected to Internet.

![laboite system overview](https://raw.github.com/bgaultier/laboite-web-app/templates/images/overview_en_US.svg)

Installation
------------

1. [Install a LAMP server](http://wiki.debian.org/LaMp)
2. [Fork this repo](https://help.github.com/articles/fork-a-repo) 
3. Clone it to your `/var/www/` directory
4. Import the database by using this command (please use [this SQL dump](https://raw.github.com/bgaultier/laboite-webapp/master/laboite-webapp.sql)): `$ mysql -u root -p <your_password> <your_database_name> < laboite-webapp.sql`
5. Create a user by typing [http://<ip_adress_of_your_server>/signup])(http://www.laboite.cc/signup) in your web browser
6. Plug one of your device and enjoy a freshly-brewed coffee !

License
-------

The code is released under The Affero General Public License version 3.
http://www.gnu.org/licenses/agpl-3.0.en.html
