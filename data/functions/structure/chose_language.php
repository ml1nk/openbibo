<?php
function chose_language($language)
{
$output='
<select class="chose" name="language" size="1">';

if ($handle = opendir("language/")) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
$out=check_language_file($file);
if($out!=null){
if($out==utf8_encode($language))
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
