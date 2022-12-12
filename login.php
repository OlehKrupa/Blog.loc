<?php
require_once "config.php";

$fields = ["login_name","login_password"];

if (!empty($_POST)){
	$error = [];
	foreach ($_POST as $k => $v) {
		if (in_array($k, $fields) && empty($v)){
			$error[$k]="field must be filled!";
		}
	}

	if (empty($error))
	{
		if ($_POST['login_name'] === USER_NAME && $_POST['login_password'] === USER_PASSWORD){
			$_SESSION['user']=$_POST['login_name'];
			header("location: /index.php");
			die();
		}
		else{
		//Типу якщо нічого не ввели то входимо як гість
		//Але так не працює
			$_SESSION['user']='guest';
			header("location: /index.php");
			die();
		}
	}
}


require_once TEMPLATES_PATH."login.html";
?>