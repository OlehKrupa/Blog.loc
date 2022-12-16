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

$current_article=$_SESSION['current_article'];

$category=$articles[$current_article]['category_id'];
$title = $articles[$current_article]['title'];
$name = $articles[$current_article]['nickname'];
$date = $articles[$current_article]['date'];
$text= $articles[$current_article]['text'];

//echo "<pre>";
//print_r($_SESSION['current_article']);
//echo "</pre>";

require_once TEMPLATES_PATH."admin_page.php";
?>