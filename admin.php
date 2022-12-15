<?php
require_once "config.php";

$result = $dbConnect->query("SELECT `a`.`category_id`, `u`.`nickname`,`a`.`title`,`a`.`text`,`a`.`date` FROM `articles` as `a`
INNER join `user` as `u` on `a`.`user_id`=`u`.`id`
where `moderated`=0");
$articles = $result->fetchAll(PDO::FETCH_ASSOC);

$current_article=1;

$category=$articles[$current_article]['category_id'];
$title = $articles[$current_article]['title'];
$name = $articles[$current_article]['nickname'];
$date = $articles[$current_article]['date'];
$text= $articles[$current_article]['text'];

echo "<pre>";
print_r($articles);
echo "</pre>";

require_once TEMPLATES_PATH."admin.html";
?>