<?php
session_start();

define("USER_NAME","Zhabka");
define("USER_PASSWORD","1111");

define("ROOT_PATH", dirname(__FILE__));
define("TEMPLATES_PATH", dirname(__FILE__).DIRECTORY_SEPARATOR."templates".DIRECTORY_SEPARATOR);
define("DB_NAME","blog");
define("DB_USER","db_user");
define("DB_USER_PASS","1111");


$db_connect = new PDO('mysql:host=localhost;dbname'.DB_NAME,DB_USER,DB_USER_PASS);

?>