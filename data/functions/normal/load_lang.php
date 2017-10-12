<?php
function load_lang($lang)
{
$lang =  utf8_encode($lang);
$pathtolang="language/".$lang.".lang.xml";
if (file_exists ($pathtolang))
{
return simplexml_load_file($pathtolang);
}
else
{
error_language($lang);
}
}
