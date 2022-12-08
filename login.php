<?php
require_once "config.php";

if (!empty($_POST['login_name']) && !empty($_POST['login_password'])){
	if ($_POST['login_name'] === USER_NAME && $_POST['login_password'] === USER_PASSWORD){
		$_SESSION['user']=$_POST['login_name'];
		header("location: /index.php");
		die();
	}
	else{
		//Типу якщо нічого не ввели то входимо як гість
		$_SESSION['user']='guest';
		header("location: /index.php");
		die();
	}
}

require_once TEMPLATES_PATH."login.html";
?>