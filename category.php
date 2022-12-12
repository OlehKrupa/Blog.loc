<?php
require_once "config.php";

$result = $dbConnect->query("SELECT `name` FROM `category`");
$categories = $result->fetchAll(PDO::FETCH_COLUMN);

?>