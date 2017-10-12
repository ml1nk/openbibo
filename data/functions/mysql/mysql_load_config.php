<?php
//get all configuration from the database
function load_config()
{
$sql = 'SELECT * FROM configuration';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) > 1){error_sql($sql);}
if (mysqli_num_rows($adressen_query) > 0){
while ($adr = mysqli_fetch_array($adressen_query)){
return array($adr["language"], $adr["design"], $adr["logout_time"],$adr["library_name"],$adr["borrow_days"],$adr["info_text"],$adr["cent_per_day"]);
}}else{error_sql($sql);}}
