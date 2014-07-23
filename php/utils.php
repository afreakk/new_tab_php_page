<?php
function li_fy($str)
{
    return "\n\t\t<li>$str\n\t\t</li>";
}
function imgHTML($img)
{
    return "<img src='$img'/>";
}
function href($url, $titletext)
{
    return "<a href=$url>$titletext</a>";
}
