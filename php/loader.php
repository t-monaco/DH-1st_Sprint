<?php

require 'helpers.php';
require 'Classes/MYSQL.php';
require 'Classes/Validator.php';
require 'Classes/UserFactory.php';
require 'Classes/AvatarFactory.php';
require 'Classes/Database.php';
require 'Classes/DBJSON.php';
require 'Classes/HashPassword.php';
require 'Classes/User.php';
require 'Classes/Product.php';
require 'Classes/ProductFactory.php';
require 'Classes/Auth.php';
require 'Classes/Session.php';
require 'Classes/Cookie.php';
require 'Classes/EmailFactory.php';


session_start();

$validator = new Validator();
$factory = new UserFactory();
$avatarFactory = new AvatarFactory();
$productFactory = new ProductFactory();
$db = new DBJSON('users.json');
$auth = new Auth();

$mi_username = "root";
$mi_password = "";
$mi_host = "127.0.0.1";
$mi_base_de_datos = "techhub";
$mi_puerto = "3306";

$pdo = MYSQL::connect($mi_username, $mi_password, $mi_host, $mi_base_de_datos, $mi_puerto);
