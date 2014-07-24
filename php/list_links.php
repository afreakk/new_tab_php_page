<?php
require_once("utils.php");
require_once("dbtalk.php");
function echoHTMLLinks($saved_links)
{
    foreach ($saved_links as $link)
    {
        echo li_fy(href($link["url"], imgHTML($link["img"])));
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
