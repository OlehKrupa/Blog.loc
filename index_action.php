<?php
require_once "config.php";
$delete_id=-1;

if ($delete_id>0)
{
	$stmt = $dbConnect->prepare("DELETE FROM `articles` WHERE `id`=:id");
	$stmt->execute(["id"=>$delete_id]);
}

require_once TEMPLATES_PATH."index.php";
?>