<?php

// Get a media with a barcode
function getmediawithbarcode($barcode)
{

$sql = 'SELECT * FROM media_copy WHERE barcode="'.filter($barcode).'"';
$adressen_query2 = db::get()->query($sql) or error_sql($sql);

if (mysqli_num_rows($adressen_query2) > 1){error_sql($sql);}
if (mysqli_num_rows($adressen_query2) == 0){return null;}

$adr = mysqli_fetch_array($adressen_query2);
$out["copy_id"]=$adr["copy_id"];
$sql = 'SELECT * FROM media_list WHERE media_id = "'.filter($adr["media_id"]).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);

if (mysqli_num_rows($adressen_query) > 1){error_sql($sql);}
if (mysqli_num_rows($adressen_query) == 0){error_sql($sql);}

$adr = mysqli_fetch_array($adressen_query);

$out["media_id"] = $adr["media_id"];
$out["type_id"] = $adr["type_id"];
$out["category_id"] = $adr["category_id"];
$out["series"] = $adr["series"];
$out["title"] = $adr["title"];
$out["author"] = $adr["author"];
$out["available"] = is_available($adr["media_id"]);

return $out;
}


function getmediawithtitle($title)
{
$sql = 'SELECT * FROM media_list WHERE title LIKE "%'.filter($title).'%"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) == 0){return null;}
$i=0;
while ($adr = mysqli_fetch_array($adressen_query)){
$out[$i]["media_id"] = $adr["media_id"];
$out[$i]["type_id"] = $adr["type_id"];
$out[$i]["category_id"] = $adr["category_id"];
$out[$i]["series"] = $adr["series"];
$out[$i]["title"] = $adr["title"];
$out[$i]["author"] = $adr["author"];
$out[$i]["available"] = is_available($adr["media_id"]);
$i++;
}
return $out;
}

function getmediawithauthor($author)
{
$sql = 'SELECT * FROM media_list WHERE author LIKE "%'.filter($author).'%"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) == 0){return null;}
$i=0;
while ($adr = mysqli_fetch_array($adressen_query)){
$out[$i]["media_id"] = $adr["media_id"];
$out[$i]["type_id"] = $adr["type_id"];
$out[$i]["category_id"] = $adr["category_id"];
$out[$i]["series"] = $adr["series"];
$out[$i]["title"] = $adr["title"];
$out[$i]["author"] = $adr["author"];
$out[$i]["available"] = is_available($adr["media_id"]);
$i++;
}
return $out;
}

function getcopy($media_id)
{
$sql = 'SELECT * FROM media_copy WHERE media_id = "'.filter($media_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) == 0){return null;}
$i=0;
while ($adr = mysqli_fetch_array($adressen_query)){
$out[$i]["copy_id"] = $adr["copy_id"];
$out[$i]["barcode"] = $adr["barcode"];
$out[$i]["user"]=getinfofromborrow($media_id,$out[$i]["copy_id"]);

$i++;
}
return $out;
}

function getallborrowwithuserid($user_id)
{
$sql = 'SELECT * FROM borrow WHERE user_id = "'.filter($user_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) == 0){return null;}
$i=0;
while ($adr = mysqli_fetch_array($adressen_query)){
$out[$i]["media_id"] = $adr["media_id"];
$out[$i]["copy_id"] = $adr["copy_id"];
$out[$i]["timestamp"] = $adr["timestamp"];
$out[$i]["days"] = $adr["days"];
$out[$i]["renewal_count"] = $adr["renewal_count"];
$out[$i]["media_info"]=gettherest($out[$i]["media_id"],$out[$i]["copy_id"]);

$i++;
}
return $out;
}

function gettherest($media_id,$copy_id)
{
$sql = 'SELECT * FROM media_copy WHERE media_id = "'.filter($media_id).'" AND copy_id = "'.filter($copy_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) != 1){error_sql($sql);}
$adr = mysqli_fetch_array($adressen_query);
$out["barcode"] = $adr["barcode"];

$sql = 'SELECT * FROM media_list WHERE media_id = "'.filter($media_id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) != 1){error_sql($sql);}
$adr = mysqli_fetch_array($adressen_query);
$out["title"] = $adr["title"];


return $out;
}



function getinfofromborrow($media_id,$copy_id,$user_id=null)
{
if($user_id==null)
{
$sql_part='borrow WHERE media_id = "'.filter($media_id).'" and copy_id="'.filter($copy_id).'"';
}
else
{
$sql_part='borrow WHERE media_id = "'.filter($media_id).'" and copy_id="'.filter($copy_id).'" and user_id="'.filter($user_id).'"';
}

only_one($sql_part,true);
$sql = 'SELECT * FROM '.$sql_part;
$adressen_query = db::get()->query($sql) or error_sql($sql);
while ($adr = mysqli_fetch_array($adressen_query)){
$out["timestamp"]=$adr["timestamp"];
$out["days"]=$adr["days"];
$out["renewal_count"]=$adr["renewal_count"];
$out["user_id"]=$adr["user_id"];
$sql_part='user WHERE user_id = "'.$adr["user_id"].'"';
only_one($sql_part,false);
$sql = 'SELECT * FROM '.$sql_part;
$adressen_query = db::get()->query($sql) or error_sql($sql);
$adr = mysqli_fetch_array($adressen_query);
$out["name"]=$adr["name"];
$out["barcode"]=$adr["barcode"];
return $out;
}
$out["nothing"]="yes";
return $out;
}

function getuserwithbarcode($barcode)
{

$sql = 'SELECT * FROM user WHERE barcode = "'.filter($barcode).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);

if (mysqli_num_rows($adressen_query) > 1){error_sql($sql);}
if (mysqli_num_rows($adressen_query) == 0){return null;}

$adr = mysqli_fetch_array($adressen_query);


$out["user_id"] = $adr["user_id"];
$out["name"] = $adr["name"];
$out["email"] = $adr["email"];
$out["barcode"] = $adr["barcode"];
$out["status"] = is_borrow_correct($adr["user_id"]);

return $out;
}

function getuserwithname($name)
{
$out=null;
$sql = 'SELECT * FROM user WHERE name LIKE "%'.filter($name).'%"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) == 0){return null;}
$i=0;
while ($adr = mysqli_fetch_array($adressen_query)){
$out[$i]["user_id"] = $adr["user_id"];
$out[$i]["name"] = $adr["name"];
$out[$i]["email"] = $adr["email"];
$out[$i]["barcode"] = $adr["barcode"];
$out[$i]["status"] = is_borrow_correct($adr["user_id"]);
$i++;
}
return $out;
}

function getuserwithemail($email)
{
$out=null;
$sql = 'SELECT * FROM user WHERE email LIKE "%'.filter($email).'%"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) == 0){return null;}
$i=0;
while ($adr = mysqli_fetch_array($adressen_query)){
$out[$i]["user_id"] = $adr["user_id"];
$out[$i]["name"] = $adr["name"];
$out[$i]["email"] = $adr["email"];
$out[$i]["barcode"] = $adr["barcode"];
$out[$i]["status"] = is_borrow_correct($adr["user_id"]);
$i++;
}
return $out;
}

function getallmanager($manager_id)
{
$out=null;
$sql = 'SELECT * FROM manager';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) < 2){return null;}
$i=0;
while ($adr = mysqli_fetch_array($adressen_query)){
if($adr["manager_id"]!=$manager_id)
{
$out[$i]["name"]= $adr["name"];
$out[$i]["manager_id"]= $adr["manager_id"];
$i++;
}}
return $out;
}


function getallcategories()
{
$out=null;
$sql = 'SELECT * FROM media_category';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) < 2){return null;}
$i=0;
while ($adr = mysqli_fetch_array($adressen_query)){
$out[$i]["name"]= $adr["name"];
$out[$i]["category_id"]= $adr["category_id"];
$out[$i]["count"]=getallmediafromonecategory($adr["category_id"]);
$i++;
}
return $out;
}

function getalltypes()
{
$out=null;
$sql = 'SELECT * FROM media_type';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) < 2){return null;}
$i=0;
while ($adr = mysqli_fetch_array($adressen_query)){
$out[$i]["name"]= $adr["name"];
$out[$i]["type_id"]= $adr["type_id"];
$out[$i]["count"]=getallmediafromonetype($adr["type_id"]);
$i++;
}
return $out;
}

