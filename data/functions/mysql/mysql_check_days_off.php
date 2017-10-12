<?php
function check_days_off($date)
{
$sql = 'SELECT COUNT(*) FROM days_off WHERE date_bigger < "'.filter($date).'" AND date_smaller > "'.filter($date).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
$count = mysqli_fetch_array($adressen_query);
if($count[0]>0){return true;}else{return false;}
}
