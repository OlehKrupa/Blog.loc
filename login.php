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

	$stmt = $dbConnect->prepare("SELECT `id`,`nickname`,`password_hash`,`role` FROM `user` WHERE `nickname` = :login");
	$stmt->execute(["login"=>$_POST['login_name']]);
	$isExistUser = $stmt->fetch(PDO::FETCH_ASSOC);

	if (empty($isExistUser)){
		$error['login_name']="User not found!";
		$error['login_password']="Incorrect password!";
	} else if (!password_verify($_POST['login_password'], $isExistUser["password_hash"])){
		$error['login_password']="Incorrect password!";
	}

	if (empty($error))
	{
		$_SESSION['user']=$_POST['login_name'];
		$_SESSION['user_id']=$isExistUser['id'];
		$_SESSION['user_role']=$isExistUser['role'];
		header("location: /index.php");
		die();
	}
}

require_once TEMPLATES_PATH."login.html";
?>