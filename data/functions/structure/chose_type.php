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
<option value="'.$out[$i]["type_id"].'" selected>'.htmlentities($out[$i]["name"], ENT_QUOTES,"ISO-8859-1").'</option>';
}
else
{
$output=$output.'
<option value="'.$out[$i]["type_id"].'">'.htmlentities($out[$i]["name"], ENT_QUOTES,"ISO-8859-1").'</option>';
}

}
$output=$output.'
</select>
';
return $output;
}