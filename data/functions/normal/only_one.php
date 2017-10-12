<?php
function only_one($sql_part,$nothing_allow)
{
$sql = 'SELECT COUNT(*) FROM '.$sql_part;
$adressen_query = db::get()->query($sql) or error_sql($sql);
$count = mysqli_fetch_array($adressen_query);

if ($count[0] > 1){error_sql($sql);}
if(!$nothing_allow){if ($count[0] == 0){error_sql($sql);}}
}