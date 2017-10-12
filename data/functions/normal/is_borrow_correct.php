<?php
// 0 = nothing borrow 1 = borrow one or more 2 = one or more is too late
function is_borrow_correct($user_id)
{
$sql = 'SELECT * FROM borrow WHERE user_id="'.$user_id.'"';
$adressen_query = db::get()->query($sql) or error_sql($sql);
if (mysqli_num_rows($adressen_query) == 0){return 0;}

while ($adr = mysqli_fetch_array($adressen_query)){

$out = time_to_borrow($adr["timestamp"],$adr["days"]);
if(!($out[0]))
{
return 2;
}

}


return 1;
}
