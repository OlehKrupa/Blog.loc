<?php
require_once "config.php";

$result = $dbConnect->query("SELECT * FROM `category`");
$categories = $result->fetchAll(PDO::FETCH_ASSOC);

?>