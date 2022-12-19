<?php
require_once "config.php";

$fields = ["name","email","password","confirm_password"];
if (!empty($_POST)){
	$error = [];
	foreach ($_POST as $k => $v) {
		if (in_array($k, $fields) && empty($v)){
			$error[$k]="field must be filled!";
		}
	}

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$error['email']="Invalid email format";
	}

	$stmt = $dbConnect->prepare("SELECT `id` FROM `user` WHERE `email` = :email");
	$stmt->execute(["email"=>$_POST['email']]);
	$isExist = $stmt->fetch();

	if (!empty($isExist)){
		$error['email']="Email is already used!";
	}

	if ($_POST['password'] !== $_POST['confirm_password']){
		$error['confirm_password']="Password was not confirmed!";
	}

	if (empty($error)){
		$stmt = $dbConnect->prepare(
			"INSERT INTO `user`(
				`nickname`,
				`email`,
				`password_hash`,
				`auth_token`
			) 
			VALUES
			(
				:name,
				:email,
				:password,
				:auth_token
			)"
		);

		$stmt->execute(
			[
				"name"=> htmlspecialchars ($_POST['name']),
				"email"=> htmlspecialchars ($_POST['email']),
				"password"=> password_hash(htmlspecialchars ($_POST['password']), PASSWORD_DEFAULT),
				"auth_token"=> "AUTH_TOKEN_DEFAULT",
			]
		);

		$_SESSION['user']=$_POST['name'];
		$_SESSION['user_id']=$dbConnect->lastInsertId();
		$_SESSION['user_role']='user';

		header("location: /index_route.php");
		die();
	}
}

require_once TEMPLATES_PATH."login.html";
?>