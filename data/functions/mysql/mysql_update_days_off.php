<?php
function update_days_off($days_off)
{
$in_mysql = $days_off[0] . $days_off[1] . $days_off[2] . $days_off[3] . $days_off[4] . $days_off[5] . $days_off[6];
$sql = "UPDATE configuration SET days_off='".filter($in_mysql)."'";
$adressen_query = db::get()->query($sql) or error_sql($sql);
}