<?php
require_once "config.php";

$result = $dbConnect->query("SELECT `a`.`id`, `a`.`category_id`, `u`.`nickname`,`a`.`title`,`a`.`text`,`a`.`date` FROM `articles` as `a`
	INNER join `user` as `u` on `a`.`user_id`=`u`.`id`
	where `moderated`=0");
$articles = $result->fetchAll(PDO::FETCH_ASSOC);

$article_id=[];

foreach ($articles as $value) {
	array_push($article_id, $value['id']);
}

if (empty($_SESSION['current_article'])){
	$_SESSION['current_article']=0;
} 

if (isset($_POST['next'])){
	$_SESSION['current_article']++;
	if ($_SESSION['current_article']> count($article_id)-1)
	{
		$_SESSION['current_article']=0;
	}
}

if (isset($_POST['prev'])){
	$_SESSION['current_article']--;
	if ($_SESSION['current_article']< 0)
	{
		$_SESSION['current_article'] = count($article_id)-1;
	}
}

$current_article=$_SESSION['current_article'];

$category = 0;
$title = "";
$name = "";
$date = "";
$text = "";

if (!empty($articles)){

	$category = $articles[$current_article]['category_id'];
	$title = $articles[$current_article]['title'];
	$name = $articles[$current_article]['nickname'];
	$date = $articles[$current_article]['date'];
	$text = $articles[$current_article]['text'];

	if (isset($_POST['approve'])){
		$approve_category= $_POST['select_category']+1;
		$approve_title= htmlspecialchars ($_POST['title']);
		$approve_text= htmlspecialchars ($_POST['text']);

		$approve_id = $articles[$current_article]['id'];

		if (!empty($_POST)){
			$error=[];


			if (empty($error)){
				$stmt = $dbConnect->prepare(
					"UPDATE `articles` 
					SET
					`category_id` = :new_category,
					`title` = :new_title,
					`text` = :new_text,
					`moderated`= 1
					WHERE `id` = :id"
				);

				$stmt->execute([
					"new_category"=>$approve_category,
					"new_title"=>$approve_title,
					"new_text"=>$approve_text,
					"id"=>$approve_id,
				]);
			}
		}

	}

	if (isset($_POST['delete'])){
		$delete_id = $articles[$current_article]['id'];

		$stmt = $dbConnect->prepare("DELETE FROM `articles` WHERE `id`=:id");
		$stmt->execute(["id"=>$delete_id]);
	}

}
//echo "<pre>";
//print_r($_SESSION['current_article']);
//echo "</pre>";

require_once TEMPLATES_PATH."admin_page.php";
?>