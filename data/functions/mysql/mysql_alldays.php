<?php

function getalldays()
{
$out=null;
$sql = 'SELECT * FROM days_off';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$i=0;
while ($adr = mysqli_fetch_array($adressen_query)){
$out[$i]["days_off_id"]= $adr["days_off_id"];
$out[$i]["date_bigger"]= date("d.m.Y",$adr["date_bigger"]*86400);
$out[$i]["date_smaller"]= date("d.m.Y",$adr["date_smaller"]*86400);
$i++;
}
return $out;
}

