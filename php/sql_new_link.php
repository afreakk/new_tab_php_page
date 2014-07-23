<?php
require_once("dbtalk.php");
$title = $_POST["title"];
$url = $_POST["url"];
$img = $_POST["img"];
$arrange = $_POST["arrange"];
$db = new LinkDB();
$db->insert_link($title, $url, $img, $arrange);
header("Location: ../edit_links.php");
