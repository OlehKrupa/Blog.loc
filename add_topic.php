<?php
require_once "config.php";

$fields = ["title","text"];

$selected_category = $_POST['select_category']+1;
$current_user_id = $_SESSION['user_id'];

if (!empty($_POST)){
	$error =[];
	foreach ($_POST as $k => $v) {
		if (in_array($k, $fields) && empty($v)){
			$error[$k]="field must be filled!";
		}
	}

	if (empty($error)){

	$title = $_POST['title'];
	$text =$_POST['text'] ;

	echo($text);
		$stmt = $dbConnect->prepare(
			"INSERT INTO `articles`(
				`category_id`,
				`user_id`,
				`title`,
				`text`
			) 
			VALUES
			(
				:category_id,
				:user_id,
				:title,
				:article
			)"
		);

		$stmt->execute(
			[
				"category_id"=>$selected_category,
				"user_id"=>$current_user_id,
				"title"=>$title,
				"article"=>$text
			]
		);

		header("location: /index.php");
		die();
	}
}

echo "<script type='text/javascript'>alert('Ваш пост проходить модерацію');</script>";

require_once TEMPLATES_PATH."new_topic.html";
?>