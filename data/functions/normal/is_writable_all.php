<?php
function is_writable_all() {

if(!is_writable("."))
{
return false;
}
    $ffs = scandir(".");
    foreach($ffs as $ff){
 if($ff != '.' && $ff != '..'){
 if(!is_writable($ff))
{
return false;
}
 if(is_dir($ff)){
 if(!is_writable_all_sub($ff))
 {
 return false;
 }
}

}

	

	}
return true;
}


function is_writable_all_sub($dir) {

    $ffs = scandir($dir);
    foreach($ffs as $ff){
if($ff != '.' && $ff != '..'){


if(!is_writable($dir."/".$ff))
{
 return false;
}
 if(is_dir($dir."/".$ff)) {
 if(!is_writable_all_sub($dir."/".$ff))
 {
 return false;
 }
} 
}
    }
return true;
}
