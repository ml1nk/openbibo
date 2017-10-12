<?php
function get_in_time($lang,$days,$only_late){
$i=0;
$sql = 'SELECT * FROM borrow';
$adressen_query = db::get()->query($sql) or error_sql($sql);

$output = array();

if(mysqli_num_rows($adressen_query)==0){return array();}

while ($adr = mysqli_fetch_array($adressen_query)){

$out = time_to_borrow($adr["timestamp"],$days) ;


if(!$out[0] or !$only_late)
{
$output[$i]["time"]=$out[1];
$output[$i]["timestamp"]=$out[3];
$output[$i]["user_id"]=$adr["user_id"];
$output[$i]["media_id"]=$adr["media_id"];
$output[$i]["copy_id"]=$adr["copy_id"];
$output[$i]["days_late"]=$out[2];
$configuration = load_config();
$output[$i]["cent_per_day"]=$out[2]*$configuration[6];

$sql = 'SELECT name, email FROM user WHERE  user_id= "'.filter($adr["user_id"]).'"';
$adressen_query2 = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query2) == 0){error_sql($sql);}
if (mysqli_num_rows($adressen_query2) >1){error_sql($sql);}
$adr2 = mysqli_fetch_array($adressen_query2);
$output[$i]["name"]=$adr2["name"];
$output[$i]["email"]=$adr2["email"];

$sql = 'SELECT title FROM media_list WHERE  media_id= "'.filter($adr["media_id"]).'"';
$adressen_query2 = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query2) == 0){error_sql($sql);}
if (mysqli_num_rows($adressen_query2) >1){error_sql($sql);}
$adr2 = mysqli_fetch_array($adressen_query2);
$output[$i]["title"]=$adr2["title"];


$sql = 'SELECT barcode FROM media_copy WHERE  media_id= "'.filter($adr["media_id"]).'" AND copy_id= "'.filter($adr["copy_id"]).'"';
$adressen_query2 = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query2) == 0){error_sql($sql);}
if (mysqli_num_rows($adressen_query2) >1){error_sql($sql);}
$adr2 = mysqli_fetch_array($adressen_query2);
$output[$i]["barcode"]=$adr2["barcode"];

$i++;
}
}
return $output;
}
