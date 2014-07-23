<?php
require_once("dbtalk.php");
$id = $_POST["id"];
$db = new LinkDB();
$db->delete_link($id);
header("Location: ../edit_links.php");
