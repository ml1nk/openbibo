<?php
function get_days_off()
{
$sql = 'SELECT days_off FROM configuration';
$adressen_query2 = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query2) > 1){error_sql($sql);}
if (mysqli_num_rows($adressen_query2) == 0){error_sql($sql);}
$adr = mysqli_fetch_array($adressen_query2);

$out = str_split($adr["days_off"]);

return $out;
}