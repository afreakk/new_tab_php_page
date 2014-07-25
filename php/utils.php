<?php
function clean_str($string)
{
   $string = str_replace(' ', '-', $string); 
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
}
function img_pathify($img, $phpfolder=FALSE)
{
    if($phpfolder)
        return "../cached_imgs/".clean_str($img);
    else
        return "cached_imgs/".clean_str($img);
}

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
function cache_img($img, $phpfolder=TRUE)
{
    $local_img = img_pathify($img, $phpfolder);
    if(!file_exists($local_img))
    {
        echo $img;
        file_put_contents($local_img, file_get_contents($img));
    }
}
function removeCache($img, $phpfolder=TRUE)
{
    $local_img = img_pathify($img, $phpfolder);
    if(file_exists($local_img))
    {
        unlink($local_img);
    }
}
function update_img($id, $img, $db)
{
    $old_img = $db->get_img_url($id);
    removeCache($old_img, TRUE);
    cache_img($img, TRUE);
}
