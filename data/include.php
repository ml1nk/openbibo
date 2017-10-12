<?php
require_once("config.cfg.php");
require_once("version.php");

function include_all_with_subfolders($dir){
    $ffs = scandir($dir);
    foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
if(pathinfo($dir.'/'.$ff, PATHINFO_EXTENSION)=="php")
{
require_once($dir.'/'.$ff);
}

 if(is_dir($dir.'/'.$ff)) include_all_with_subfolders($dir.'/'.$ff);
        }
    }
}

include_all_with_subfolders('functions/');
