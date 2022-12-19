<?php
require_once "config.php";

if (empty($_POST["select_category"])){
	$select=0;
} else{
	$select = $_POST["select_category"];
}

$stmt=$dbConnect->prepare(
	"SELECT `title`,`text` from `articles` where `moderated` = '1' and `category_id`= :selected_category+1");

$stmt->execute(["selected_category"=>$select]);
$topics = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once TEMPLATES_PATH."index.php";
?>