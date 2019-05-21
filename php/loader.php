<?php

require 'helpers.php';
require 'Classes/Validator.php';
require 'Classes/UserFactory.php';
require 'Classes/Database.php';
require 'Classes/DBJSON.php';
require 'Classes/HashPassword.php';
require 'Classes/User.php';
require 'Classes/Auth.php';
require 'Classes/Session.php';
require 'Classes/Cookie.php';
require 'model/class.conection.php';
require 'model/class.query.php';
require 'Classes/MYSQL.php';
require 'Classes/EmailFactory.php';


session_start();

$validator = new Validator();
$factory = new UserFactory();
$db = new DBJSON('users.json');
$auth = new Auth();
