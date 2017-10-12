<?php
function database_version()
{
$sql = 'SELECT database_version FROM configuration';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) > 1){error_sql($sql);}
if (mysqli_num_rows($adressen_query) > 0){
while ($adr = mysqli_fetch_array($adressen_query)){
return $adr["database_version"];
}}else{error_sql($sql);}}
