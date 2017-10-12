<?php

//Get all entrys from media_list
function getallmedia()
{
$sql = 'SELECT COUNT(*) FROM media_list';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$count = mysqli_fetch_array($adressen_query);
return $count[0];
}

//Get all entrys from media_copy
function getallcopy()
{
$sql = 'SELECT COUNT(*) FROM media_copy';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$count = mysqli_fetch_array($adressen_query);
return $count[0];
}

//Get all entrys from borrow
function getallborrow()
{
$sql = 'SELECT COUNT(*) FROM borrow';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$count = mysqli_fetch_array($adressen_query);
return $count[0];
}

//Get all entrys from user
function getalluser()
{
$sql = 'SELECT COUNT(*) FROM user';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$count = mysqli_fetch_array($adressen_query);
return $count[0];
}

//Count all media from one category
function getallmediafromonecategory($category_id)
{
$sql = 'SELECT COUNT(*) FROM media_list WHERE category_id="'.filter($category_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$count = mysqli_fetch_array($adressen_query);
return $count[0];
}

//Count all media from one type
function getallmediafromonetype($type_id)
{
$sql = 'SELECT COUNT(*) FROM media_list WHERE type_id="'.filter($type_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$count = mysqli_fetch_array($adressen_query);
return $count[0];
}

function if_manager_exist($name)
{
$sql = 'SELECT COUNT(*) FROM manager WHERE name = "'.filter($name).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$count = mysqli_fetch_array($adressen_query);
if($count[0]>1){error_sql($sql);}
if($count[0]<1){return false;}else{return true;}
}

