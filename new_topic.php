<?php
require_once "config.php";

if(empty($_SESSION['user'])){
	header("location: /login.php");
	die();
}

require_once TEMPLATES_PATH."new_topic.html";
?>