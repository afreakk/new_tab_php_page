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
        "<form action='php/sql_upd_link.php' method='post'>
            <input type='hidden' value=$id name='id'> 
            arrange:<input type='text' value=$arrange name='arrange'> <br>
            title:<input type='text' value=$title name='title'> <br>
            url:<input type='text' value=$url name='url'> <br>
            imgurl:<input type='text' value=$img name='img'>
            <input type='submit' value='update'>
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

<div class="wrapper">
	<div class="container">
		<h1>*___*</h1>
			<ul class="rig columns-4">
                <?php echoHTMLLinks($saved_links); ?>
			</ul>
	</div>
</div>
