<?php
function chose_category($category_id)
{
$out = getmediacategory_all();

$output='
<select class="right2" name="category_id" size="1">';
for($i=0;count($out)>$i;$i++)
{
if($out[$i]["category_id"]==$category_id)
{
$output=$output.'
<option value="'.$out[$i]["category_id"].'" selected>'.htmlentities($out[$i]["name"], ENT_QUOTES).'</option>';
}
else
{
$output=$output.'
<option value="'.$out[$i]["category_id"].'">'.htmlentities($out[$i]["name"], ENT_QUOTES).'</option>';
}
}
$output=$output.'
</select>
';
return $output;
}
