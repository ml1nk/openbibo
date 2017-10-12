<?php
function chose_design($design)
{
$output='
<select class="chose" name="design" size="1">';

if ($handle = opendir("design/")) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
$out=check_design_file($file);
if($out!=null){
if($out==utf8_encode($design))
{
$output=$output.'
<option value="'.htmlentities($out, ENT_QUOTES,"UTF-8").'" selected>'.htmlentities($out, ENT_QUOTES,"UTF-8").'</option>';
}
else
{
$output=$output.'
<option value="'.htmlentities($out, ENT_QUOTES,"UTF-8").'">'.htmlentities($out, ENT_QUOTES,"UTF-8").'</option>';
}
        }
        
        }
    }
    closedir($handle);
}

$output=$output.'
</select>
';

return $output;
}
