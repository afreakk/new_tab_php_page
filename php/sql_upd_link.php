<?php
require_once("dbtalk.php");
$id = $_POST["id"];
$title = $_POST["title"];
$url = $_POST["url"];
$img = $_POST["img"];
$arrange = $_POST["arrange"];
$db = new LinkDB();
$db->update_link($title, $url, $img, $id, $arrange);
header("Location: ../edit_links.php");
