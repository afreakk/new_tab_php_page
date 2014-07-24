<?php
require_once("dbtalk.php");
require_once("utils.php");
$id = $_POST["id"];
$img = $_POST["img"];
$db = new LinkDB();
removeCache($img,TRUE);
$db->delete_link($id);
header("Location: ../edit_links.php");
