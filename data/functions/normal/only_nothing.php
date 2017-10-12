<?php
function only_nothing($sql_part)
{
$sql = 'SELECT COUNT(*) FROM '.$sql_part;
$adressen_query = db::get()->query($sql) or error_sql($sql);
$count = mysqli_fetch_array($adressen_query);
if ($count[0] > 0){return false;}
return true;
}