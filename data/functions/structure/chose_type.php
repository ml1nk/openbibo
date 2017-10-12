<?php
function chose_type($type_id)
{
$out = getmediatype_all();

$output='
<select class="right2" name="type_id" size="1">';
for($i=0;count($out)>$i;$i++)
{

if($out[$i]["type_id"]==$type_id)
{
$output=$output.'
<option value="'.$out[$i]["type_id"].'" selected>'.htmlentities($out[$i]["name"], ENT_QUOTES).'</option>';
}
else
{
$output=$output.'
<option value="'.$out[$i]["type_id"].'">'.htmlentities($out[$i]["name"], ENT_QUOTES).'</option>';
}

}
$output=$output.'
</select>
';
return $output;
}