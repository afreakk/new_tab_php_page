<?php
require_once("dbtalk.php");
require_once("utils.php");
function inputLabel($value, $var_name, $color="red")
{
    return " 
            <label for='$var_name'>$var_name:</label>
            <input id='$var_name' type='text' value=$value name='$var_name'>";
}
function createInput($url, $title, $img, $id, $arrange)
{
    if(empty($url))
        $url = "0";
    if(empty($title))
        $title = "0";
    if(empty($img))
        $img = "0";
    if(empty($arrange))
        $arrange = "0";
    return 
        "<br>
        <form action='php/sql_upd_link.php' method='post'>
            <input type='hidden' value=$id name='id'> "
            . inputLabel($arrange, "arrange") . inputLabel($title, "title") . inputLabel($url, "url") . inputLabel($img, "img") .
            "<input type='submit' value='update' size='5'>
        </form>";
}

function createDelete($id, $img)
{
    return 
        "<form action='php/sql_dlt_link.php' method='post'>
            <input type='hidden' value=$id readonly name='id'>
            <input type='hidden' value=$img readonly name='img'>
            <input type='submit' value='delete'>
        </form>";
}
function echoHTMLLinks($saved_links)
{
    foreach ($saved_links as $link)
    {
        echo li_fy(createInput($link["url"], $link["title"], $link["img"], $link["id"], $link["arrange"]) . createDelete($link["id"], $link["img"]));
    }
}
$db = new LinkDB();
$saved_links = $db->get_ordered();
?>
<div class="container">
    <ul class="rig">
        <?php echoHTMLLinks($saved_links); ?>
    </ul>
</div>
