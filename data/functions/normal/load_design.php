<?php
function load_design($design,$where,$menu)
{
$design =  utf8_encode($design);
$pathtodesign="design/".$design.".design";
if (file_exists ($pathtodesign))
{

$css="";
$pathtocss = $pathtodesign."/global.css";
if (file_exists ($pathtocss))
{
$css = '
<link rel="stylesheet" type="text/css" href="'.$pathtocss.'">';
}

if($menu){
$pathtomenu = $pathtodesign."/menu.css";
if (file_exists ($pathtomenu))
{
$css = $css.'
<link rel="stylesheet" type="text/css" href="'.$pathtomenu.'">';
}}

$pathtocss = $pathtodesign."/".$where.".css";
if (file_exists ($pathtocss))
{
$css = $css.'
<link rel="stylesheet" type="text/css" href="'.$pathtocss.'">';
}

return $css;
}
else
{
error_design($design);
}
}
