<?php
function new_days_off($bigger,$smaller)
{
$sql = 'INSERT INTO days_off (date_bigger,date_smaller) VALUES ("'.filter($bigger).'", "'.filter($smaller).'")';
$adressen_query = db::get()->query($sql) or error_sql($sql);
}