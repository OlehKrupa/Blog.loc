<?php
require_once "config.php";

if(empty($_SESSION['user'])){
	header("location: /login.php");
	die();
}

if($_SESSION['user_role']==='user'){
	require_once TEMPLATES_PATH."index.php";
}

if($_SESSION['user_role']==='admin'){
	header("location: /admin.php");
	die();
}

?>