<?php
require_once("dbtalk.php");
require_once("utils.php");
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
            <input type='hidden' value=$id name='id'> 
            <label for='arrange'>arrange:</label>
            <input id='arrange' type='text' value=$arrange name='arrange'>
            <label for='title'>title:</label>
            <input id='title'type='text' value=$title name='title'>
            <label for='url'>url:</label>
            <input id='url' type='text' value=$url name='url'>
            <label for='imgurl'>imgurl:</label>
            <input id='imgurl' type='text' value=$img name='img'>
            <input type='submit' value='update' size='5'>
        </form>";
}

function createDelete($id)
{
    return 
        "<form action='php/sql_dlt_link.php' method='post'>
            <input type='hidden' value=$id readonly name='id'>
            <input type='submit' value='delete'>
        </form>";
}
function echoHTMLLinks($saved_links)
{
    foreach ($saved_links as $link)
    {
        echo li_fy(createInput($link["url"], $link["title"], $link["img"], $link["id"], $link["arrange"]) . createDelete($link["id"]));
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
