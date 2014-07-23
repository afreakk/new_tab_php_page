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

<div class="wrapper">
	<div class="container">
		<h1>*___*</h1>
			<ul class="rig columns-4">
                <?php echoHTMLLinks($saved_links); ?>
			</ul>
	</div>
</div>
