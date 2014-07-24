<?php
require_once("utils.php");
require_once("dbtalk.php");
function echoHTMLLinks($saved_links)
{
    foreach ($saved_links as $link)
    {
        $img = img_pathify($link["img"]);
        echo li_fy(href($link["url"], imgHTML($img)));
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
