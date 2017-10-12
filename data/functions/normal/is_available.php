<?php
function is_available($media_id)
{
$sql = 'SELECT COUNT(*) FROM media_copy WHERE media_id="'.filter($media_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$count1 = mysqli_fetch_array($adressen_query);


$sql = 'SELECT COUNT(*) FROM borrow WHERE media_id="'.filter($media_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$count2 = mysqli_fetch_array($adressen_query);


if($count1>$count2)
{return true;}
else
{return false;}

}