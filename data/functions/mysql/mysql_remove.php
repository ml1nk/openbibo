<?php

function getandremoveborrow($media_id,$copy_id)
{
$sql = 'SELECT * FROM borrow WHERE media_id="'.filter($media_id).'" AND copy_id="'.filter($copy_id).'"';

$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) == 0){return null;}
if (mysqli_num_rows($adressen_query) > 1){error_sql($sql);}

$adr = mysqli_fetch_array($adressen_query);
$out["user_id"] = $adr["user_id"];
$out["media_id"] = $adr["media_id"];
$out["copy_id"] = $adr["copy_id"];
$out["timestamp"] = $adr["timestamp"];
$out["days"] = $adr["days"];
$out["renewal_count"] = $adr["renewal_count"];
$out["time"]=time_to_borrow($out["timestamp"],$out["days"]);


$sql = 'SELECT * FROM user WHERE user_id = "'.filter($out["user_id"]) .'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) == 0){error_sql($sql);}
if (mysqli_num_rows($adressen_query) > 1){error_sql($sql);}
$adr = mysqli_fetch_array($adressen_query);
$out["user_name"] = $adr["name"];

$sql = 'SELECT * FROM media_list WHERE media_id = "'.filter($out["media_id"]) .'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) == 0){error_sql($sql);}
if (mysqli_num_rows($adressen_query) > 1){error_sql($sql);}
$adr = mysqli_fetch_array($adressen_query);
$out["media_title"] = $adr["title"];


if(delete_borrow($copy_id,$media_id,null)==null)
{
return null;
}

return $out;
}


function delete_borrow($copy_id,$media_id,$user_id)
{

if($user_id != null)
{
$sql_part = 'borrow WHERE media_id="'.filter($media_id).'" AND copy_id="'.filter($copy_id).'" AND user_id="'.filter($user_id).'"';
}
else
{
$sql_part = 'borrow WHERE media_id="'.filter($media_id).'" AND copy_id="'.filter($copy_id).'"';
}

only_one($sql_part,true);
$not_douple=only_nothing($sql_part);
if($not_douple)
{
return false;
}
$sql='DELETE FROM '.$sql_part;
$adressen_query = db::get()->query($sql) or error_sql($sql);
return true;
}

function delete_all_borrow($user_id)
{
$sql='DELETE FROM borrow WHERE user_id="'.filter($user_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
return mysqli_affected_rows();
}



function delete_copy($copy_id,$media_id)
{

$sql_part = 'media_copy WHERE media_id="'.filter($media_id).'" and copy_id="'.filter($copy_id).'"';
only_one($sql_part,true);
$not_douple=only_nothing($sql_part);
if($not_douple)
{
return false;
}
delete_borrow($copy_id,$media_id);
$sql='DELETE FROM '.$sql_part;
$adressen_query = db::get()->query($sql) or error_sql($sql);
return true;
}

function delete_media($media_id)
{
$sql_part = 'media_list WHERE media_id="'.filter($media_id).'"';
only_one($sql_part,true);

$sql='DELETE FROM borrow WHERE media_id="'.filter($media_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$sql='DELETE FROM media_copy WHERE media_id="'.filter($media_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$sql='DELETE FROM media_list WHERE media_id="'.filter($media_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
}

function delete_user($user_id)
{
$sql_part = 'user WHERE user_id="'.filter($user_id).'"';
only_one($sql_part,true);

$sql='DELETE FROM user WHERE user_id="'.filter($user_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$sql='DELETE FROM borrow WHERE user_id="'.filter($user_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);

}

function delete_manager($manager_id)
{
$sql='DELETE FROM manager WHERE manager_id="'.filter($manager_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
return mysqli_affected_rows();
}

function delete_category($category_id)
{
$sql = 'SELECT * FROM media_list WHERE category_id="'.filter($category_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) > 0){
while ($adr = mysqli_fetch_array($adressen_query)){
delete_media($adr["media_id"]);
}}

$sql='DELETE FROM media_category WHERE category_id="'.filter($category_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
}

function delete_type($type_id)
{
$sql = 'SELECT * FROM media_list WHERE type_id="'.filter($type_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) > 0){
while ($adr = mysqli_fetch_array($adressen_query)){
delete_media($adr["media_id"]);
}}

$sql='DELETE FROM media_type WHERE type_id="'.filter($type_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
}
