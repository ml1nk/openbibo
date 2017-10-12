<?php

//Get the ID and name with a valid session key
function getmyid($cookie,$logout_time)
{
$sql = 'SELECT * FROM manager WHERE cookie = "'.cryptmytext($cookie).'" and login="1" and lastip="'.getip().'" and lastactivity>"'.(time()-$logout_time).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) > 1){error_sql($sql);}
if (mysqli_num_rows($adressen_query) > 0){
while ($adr = mysqli_fetch_array($adressen_query)){
return array(true, $adr["manager_id"], $adr["name"]);
}}else{return array(false);}
}

//get category name with category_id
function getmediacategory($number) {
$sql = 'SELECT * FROM media_category WHERE category_id="'.filter($number).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) > 1){error_sql($sql);}
if (mysqli_num_rows($adressen_query) > 0){
while ($adr = mysqli_fetch_array($adressen_query)){
return $adr["name"];}}
else{error_sql($sql);}
}

//get all categories
function getmediacategory_all() {
$sql = 'SELECT * FROM media_category';
$adressen_query = db::get()->query($sql) or error_sql($sql);

$i = 0;
while ($adr = mysqli_fetch_array($adressen_query)){
$out[$i]["name"]=$adr["name"];
$out[$i]["category_id"]=$adr["category_id"];
$i++;
}
return $out;
}

//get type name and picture with type_id
function getmediatyp($number) {
$sql = 'SELECT * FROM media_type WHERE type_id="'.filter($number).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) > 1){error_sql($sql);}
if (mysqli_num_rows($adressen_query) > 0){
while ($adr = mysqli_fetch_array($adressen_query)){
return array($adr["name"], $adr["picture"]);
}}else{error_sql($sql);}
}

//get all types
function getmediatype_all() {
$sql = 'SELECT * FROM media_type';
$adressen_query = db::get()->query($sql) or error_sql($sql);

$i = 0;
while ($adr = mysqli_fetch_array($adressen_query)){
$out[$i]["name"]=$adr["name"];
$out[$i]["type_id"]=$adr["type_id"];
$i++;
}
return $out;
}
