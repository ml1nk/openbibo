<?php
function remove_days_off($id)
{
$sql='DELETE FROM days_off WHERE days_off_id="'.filter($id).'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
return mysqli_affected_rows();
}
